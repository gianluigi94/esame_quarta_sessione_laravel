<?php

namespace App\Http\Controllers\v1;

use App\Helpers\app_helpers;
use App\Http\Controllers\Controller;
use App\Models\accesso_model;
use App\Models\autenticazione_model;
use App\Models\configurazione_model;
use App\Models\contatto_model;
use App\Models\password_model;
use App\Models\sessione_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class accedi_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($utente, $hash = null)
    {
        if ($hash == null) {
            return accedi_controller::controllo_utente($utente);
        }
        return accedi_controller::controllo_password($utente, $hash);
    }


    protected static function controllo_utente($utente)
    {
        // $hashed_user = hash("sha512", trim($utente));
        $sale = hash("sha512", trim(Str::random(200)));

        if (autenticazione_model::esistente_utente_valido_per_login($utente)) {

            $auth = autenticazione_model::where('user', $utente)->first();

            $auth->secret_jwt = hash("sha512", trim(Str::random(200)));
            $auth->inizio_sfida = date('Y-m-d H:i:s', time());
            $auth->save();
            $record_password = password_model::password_attuale($auth->id_contatto);
            $record_password->sale = $sale;
            $record_password->save();

            $dati = array("sale" => $sale);
            return app_helpers::risposta_custom($dati);
        } else {
            accesso_model::aggiungi_tentativo_fallito(null);
            return json_encode([
                'message' => 'Ramo utente sbagliato, aggiunto tentativo fallito',
                'sale' => $sale
            ]);

        }
    }

    //PASWORD PASWORD PASWORD PASWORD PASWORD PASWORD PASWORD PASWORD PASWORD PASWORD PASWORD PASWORD

    protected static function controllo_password($utente, $hash_client)
    {

        if (autenticazione_model::esistente_utente_valido_per_login($utente)) {
            // esiste
            $auth = autenticazione_model::where('user', $utente)->first();

            $secret_jwt = $auth->secret_jwt;
            $inizio_sfida = strtotime($auth->inizio_sfida);
            $durata_sfida = configurazione_model::leggi_valore("durata_sfida");
            $max_tentativi = configurazione_model::leggi_valore("max_login_errati");
            $scadenza_sfida = $inizio_sfida + $durata_sfida;

            if ($inizio_sfida == null || $secret_jwt == null) {
                accesso_model::aggiungi_tentativo_fallito($auth->id_contatto);
                abort(404, "ATTENZIONE: LA SFIDA NON E' INIZIATA E IL SECRET JWT NON E' STATO GENERATO, AGGIUNTO TENTATIVO FALLITO");
            }
            if (time() < $scadenza_sfida) {
                $record_password = password_model::password_attuale($auth->id_contatto);

                $password = $record_password->password;
                $sale = $record_password->sale;

                $password_nascosta_db = app_helpers::nascondi_password($password, $sale);

                // $hash_client_hash = hash("sha512", trim($hash_client));
                // $psw_sale = hash("sha512", $sale . $hash_client_hash);

                if ($hash_client === $password_nascosta_db) {

                    $limite_pw = configurazione_model::leggi_valore("termina_psw");

                    $created_at = strtotime($record_password->created_at);

                    $scadenza_pw = $created_at + $limite_pw;

                    if (time() <= $scadenza_pw) {
                        $tentativi = accesso_model::conta_tentativi($auth->id_contatto);
                        $blocco_password = strtotime(contatto_model::where('id_contatto', $auth->id_contatto)->value('blocco_password'));
                        $blocco_psw = configurazione_model::leggi_valore("blocco_psw");
                        $scadenza_blocco_password = $blocco_password + $blocco_psw;


                        if (($tentativi < $max_tentativi) || (($tentativi >= $max_tentativi) && ($blocco_password != null && $scadenza_blocco_password < now()->timestamp))) {

                            $tk = app_helpers::crea_token_sessione($auth->id_contatto, $secret_jwt);
                            accesso_model::elimina_tentativi($auth->id_contatto);

                            sessione_model::elimina_sessione($auth->id_contatto);
                            sessione_model::aggiorna_sessione($auth->id_contatto, $tk);

                            $dati = array('tk' => $tk);
                            accesso_model::nuovo_record($auth->id_contatto, 1);
                            contatto_model::where('id_contatto', $auth->id_contatto)->update(['blocco_password' => null]);
                            return app_helpers::risposta_custom($dati);
                        } else {
                            contatto_model::where('id_contatto', $auth->id_contatto)->update(['blocco_password' => now()]);
                            abort(403, "ATTENZIONE: LIMITE TENTATIVI DI ACCESSO TERMINATI. RIPROVA PIU' TARDI");
                        }
                    } else {
                        accesso_model::aggiungi_tentativo_fallito($auth->id_contatto);
                        abort(403, "ATTENZIONE: PASSWORD SCADUTA, AGGIUNTO TENTATIVO FALLITO.");
                    }
                } else {
                    accesso_model::aggiungi_tentativo_fallito($auth->id_contatto);
                    abort(403, "ATTENZIONE: PASSWORD (o nome utente) NON TROVATA SUL DATABASE, AGGIUNTO TENTATIVO FALLITO");
                }
            } else {
                accesso_model::aggiungi_tentativo_fallito($auth->id_contatto);
                abort(403, "ATTENZIONE: TEMPO SFIDA SCADUTO, AGGIUNTO TENTATIVO FALLITO");
            }
        } else {
            abort(403, "ATTENZIONE: NOME UTENTE O PASSWORD NON CORRETTI");
        }
    }





    public static function verifica_token($token)
    {
        $rit = null;
        $sessione = sessione_model::dati_sessione($token);
        if ($sessione != null) {
            $inizio_sessione = strtotime($sessione->inizio_sessione);
            $durata_sessione = (int) configurazione_model::leggi_valore("durata_sessione");
            $scadenza_sessione = $inizio_sessione + $durata_sessione;

            if (time() < $scadenza_sessione) {

                $auth = autenticazione_model::where('id_contatto', $sessione->id_contatto)->first();
                if ($auth != null) {

                    $secret_jwt = $auth->secret_jwt;
                    $payload = app_helpers::valida_token($token, $secret_jwt, $sessione);
                    if ($payload != null) {
                        $rit = $payload;
                    } else {
                        abort(403, 'TK_0006');
                    }
                } else {
                    abort(403, 'TK_0005');
                }
            } else {
                abort(403, 'ATTENZIONE:SESSIONE SCADUTA');
            }
        } else {
            abort(403, 'ATTENZIONE:TOKEN NON VALIDO');
        }
        return $rit;
    }


    public function test($sale, $hash_password)
    {
        $psw_sale = hash("sha512", $sale . $hash_password);

        return response()->json(['psw_sale' => $psw_sale]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
