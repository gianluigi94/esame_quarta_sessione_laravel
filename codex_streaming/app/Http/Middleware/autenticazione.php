<?php

namespace App\Http\Middleware;

use App\Helpers\app_helpers;
use App\Http\Controllers\v1\accedi_controller;
use App\Models\contatto_model;
use App\Models\sessione_model;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;



class Autenticazione
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            abort(403, 'ATTENZIONE: TOKEN NON INSERITO');
        }

        $payload = accedi_controller::verifica_token($token);

        if ($payload != null) {
            $contatto = contatto_model::where("id_contatto", $payload->data->id_contatto)->firstOrFail();

            if ($contatto->id_stato_utente == 1) {
                Auth::login($contatto);
                $request->merge(['contatti_ruoli' => $contatto->ruoli->pluck('ruolo')->toArray()]);


                sessione_model::elimina_sessione($contatto->id_contatto);
                sessione_model::aggiorna_sessione($contatto->id_contatto, $token);

                $inizio_token_record = DB::table('autenticazioni')
                    ->where('id_contatto', $contatto->id_contatto)
                    ->first(['inizio_token']);
                if ($inizio_token_record) {
                    $inizio_token = strtotime($inizio_token_record->inizio_token);
                    $t = time();

                    $durata_token = DB::table('configurazioni')
                        ->where('chiave', 'termina_tk')
                        ->value('valore');

                    $fine_token = $inizio_token + $durata_token;


                    if ($t > $fine_token) {
                        DB::table('sessioni')
                            ->where('id_contatto', $contatto->id_contatto)
                            ->update(['token' => null]);
                        abort(403, 'TOKEN SCADUTO E RIPORTATO A NULL');
                    }
                }


                $inizio_cambio_tk = DB::table('autenticazioni')
                    ->where('id_contatto', $contatto->id_contatto)
                    ->value('inizio_cambio_tk');



                $inizio_cambio_tk_unix = strtotime($inizio_cambio_tk);

                $controllo_cambio = $inizio_cambio_tk_unix - $inizio_token;



                $cambio_token_interval = DB::table('configurazioni')
                    ->where('chiave', 'cambio_tk')
                    ->value('valore');

                $fine_cambio_token = $inizio_cambio_tk_unix + $cambio_token_interval;

                $t = time();

                if ($t > $fine_cambio_token) {
                    if ($controllo_cambio > 1) {

                        $secret_jwt = DB::table('autenticazioni')
                            ->where('id_contatto', $contatto->id_contatto)
                            ->value('secret_jwt');

                        $newToken = app_helpers::crea_token_rinnovo(
                            $contatto->id_contatto,
                            $secret_jwt
                        );
                        DB::table('sessioni')
                            ->where('id_contatto', $contatto->id_contatto)
                            ->update(['token' => $newToken]);

                        $token = $newToken;
                        abort(403, 'NUOVO TOKEN SUL DATABASE');
                    } else {
                        $now = date('Y-m-d H:i:s');
                        DB::table('autenticazioni')
                            ->where('id_contatto', $contatto->id_contatto)
                            ->update(['inizio_cambio_tk' => $now]);
                    }
                }



                return $next($request)->header('Authorization', 'Bearer ' . $token);
            } else {
                abort(403, 'ATTENZIONE: non sei un amministratore');
            }
        } else {
            abort(403, 'ATTENZIONE: il payload è vuoto');
        }
    }
}
