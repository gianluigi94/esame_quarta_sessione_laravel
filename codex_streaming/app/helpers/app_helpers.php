<?php

namespace App\Helpers;

use App\Models\autenticazione_model;
use App\Models\contatto_model;
use App\Models\sessione_model;
use Illuminate\Support\Arr;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;

class app_helpers
{
    public static function aggiorna_regole_helpers($rules)
    {
        $new_rules = Arr::map($rules, function ($value, $key) {
            return str_replace("required|", "", $value);
        });

        return  $new_rules;
    }

    public static function risposta_custom($dati, $msg = null, $err = null)
    {
        $response = array();
        $response["data"] = $dati;
        if ($msg != null) $response["message"] = $msg;
        if ($err != null) $response["error"] = $err;
        return $response;
    }

    public static function nascondi_password($password, $sale)
    {
        return hash("sha512", $sale . $password);
    }




    public static function crea_token_sessione($id_contatto, $secret_jwt, $usa_da = null, $scade = null)
    {
        $max_time = 7 * 24 * 60 * 60;
        $record_contatto = contatto_model::where('id_contatto', $id_contatto)->first();
        $t = time();
        $nbf = ($usa_da == null) ? $t : $usa_da;
        $exp = ($scade == null) ? $nbf + $max_time : $scade;
        $ruolo = $record_contatto->ruoli[0];
        $id_ruolo = $ruolo->id_ruolo;
        $abilita = $ruolo->abilita->toArray();
        $abilita = array_map(function ($arr) {
            return $arr['id_abilita'];
        }, $abilita);

        $arr = array(
            'iss' => 'https://www.codex.it',
            'aud' => null,
            'iat' => $t,
            'nbf' => $nbf,
            'exp' => $exp,
            'data' => array(
                'id_contatto' => $id_contatto,
                'id_stato_utente' => $record_contatto->id_stato_utente,
                'id_ruolo' => $id_ruolo,
                'abilita' => $abilita,
                'nome' => trim($record_contatto->nome . " " . $record_contatto->cognome)
            )
        );

        $token = JWT::encode($arr, $secret_jwt, 'HS256');

        $now = date('Y-m-d H:i:s');
        DB::table('autenticazioni')
            ->where('id_contatto', $id_contatto)
            ->update(['inizio_token' => $now]);


        return $token;
    }
    public static function crea_token_rinnovo($id_contatto, $secret_jwt, $usa_da = null, $scade = null)
    {
        $max_time = 7 * 24 * 60 * 60;
        $record_contatto = contatto_model::where('id_contatto', $id_contatto)->first();
        $t = time();
        $nbf = ($usa_da == null) ? $t : $usa_da;
        $exp = ($scade == null) ? $nbf + $max_time : $scade;
        $ruolo = $record_contatto->ruoli[0];
        $id_ruolo = $ruolo->id_ruolo;
        $abilita = $ruolo->abilita->toArray();
        $abilita = array_map(function ($arr) {
            return $arr['id_abilita'];
        }, $abilita);

        $arr = array(
            'iss' => 'https://www.codex.it',
            'aud' => null,
            'iat' => $t,
            'nbf' => $nbf,
            'exp' => $exp,
            'data' => array(
                'id_contatto' => $id_contatto,
                'id_stato_utente' => $record_contatto->id_stato_utente,
                'id_ruolo' => $id_ruolo,
                'abilita' => $abilita,
                'nome' => trim($record_contatto->nome . " " . $record_contatto->cognome)
            )
        );
        $token = JWT::encode($arr, $secret_jwt, 'HS256');

        $now = date('Y-m-d H:i:s');
        DB::table('autenticazioni')
            ->where('id_contatto', $id_contatto)
            ->update(['inizio_cambio_tk' => $now]);

        return $token;
    }


    public static function valida_token($token, $secret_jwt, $sessione)
    {
        $rit = null;

        $payload = JWT::decode($token, new \Firebase\JWT\Key($secret_jwt, 'HS256'));


        if ($payload->iat <= $sessione->inizio_sessione) {
            if ($payload->data->id_contatto == $sessione->id_contatto) {
                $rit = $payload;
            }
        }
        return $rit;
    }

    /**
     * riavvia inizio_sessione dell'utente nelle rotte aperte.
     *
     * @param Request $request, si estrae il token.
     */
    public static function gestisci_sessione($request)
    {
        // Estraggo il token dal bearer
        $token = $request->bearerToken();


        $contatto_autenticato = sessione_model::where('token', $token)->first();

        if ($contatto_autenticato) { // se vienetrovato
            sessione_model::elimina_sessione($contatto_autenticato->id_contatto);
            sessione_model::aggiorna_sessione($contatto_autenticato->id_contatto, $token);

            $autenticazione = autenticazione_model::where('id_contatto', $contatto_autenticato->id_contatto)->first();

            // Se esiste un record di autenticazione e non è stato impostato un cambio di token
            if ($autenticazione && $autenticazione->inizio_cambio_tk === null) {
                $autenticazione->inizio_cambio_tk = date('Y-m-d H:i:s', time());
                $autenticazione->save();
            }
        }
    }
}
