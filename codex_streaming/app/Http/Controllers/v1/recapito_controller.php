<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\recapi_store_request;
use App\Http\Requests\v1\recapiti_update_request;
use App\Http\Resources\v1\recapito_collection;
use App\Http\Resources\v1\recapito_resource;
use App\Models\contatto_model;
use App\Models\recapito_model;
use App\Models\tipo_recapito_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class recapito_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($contatto)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può vedere i recapiti di qualsiasi contatto
        if (Gate::allows('ruolo', 'amministratore')) {
            $risorsa = recapito_model::where('id_contatto', $contatto)
                ->with('tipo_recapito')
                ->get();
            return new recapito_collection($risorsa);
        }

        // Se l'utente non è amministratore, può vedere solo i propri recapiti
        if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$contatto) {
            $risorsa = recapito_model::where('id_contatto', $contatto)
                ->with('tipo_recapito')
                ->get();
            return new recapito_collection($risorsa);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di visualizzare questi recapiti.");
    }



    public function show($contatto, $recapito)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può vedere qualsiasi recapito
        if (Gate::allows('ruolo', 'amministratore')) {
            $risorsa = recapito_model::where('id_contatto', $contatto)
                ->where('id_recapito', $recapito)
                ->with('tipo_recapito')
                ->firstOrFail();

            return new recapito_resource($risorsa);
        }

        // Se l'utente non è amministratore, può vedere solo i propri recapiti
        if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$contatto) {
            $risorsa = recapito_model::where('id_contatto', $contatto)
                ->where('id_recapito', $recapito)
                ->with('tipo_recapito')
                ->firstOrFail();

            return new recapito_resource($risorsa);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di visualizzare questo recapito.");
    }






    public function store(recapi_store_request $request, $id_contatto)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può creare un recapito per qualsiasi contatto
        if (Gate::allows('ruolo', 'amministratore') || ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto)) {
            $data = $request->validated();

            $tipo_recapito = tipo_recapito_model::where('tipo', $data['tipo_recapito'])->firstOrFail();

            $recapito = new recapito_model();
            $recapito->id_contatto = $id_contatto;
            $recapito->id_tipo_recapito = $tipo_recapito->id_tipo_recapito;
            $recapito->recapito = $data['recapito'];
            $recapito->save();

            return new recapito_resource($recapito);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di creare un recapito per questo contatto.");
    }









    public function update(recapiti_update_request $request, $contatto, $recapito)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può aggiornare qualsiasi recapito
        if (Gate::allows('ruolo', 'amministratore') || ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$contatto)) {
            $recapito_model = recapito_model::where('id_contatto', $contatto)
                ->where('id_recapito', $recapito)
                ->firstOrFail();

            if ($request->has('tipo_recapito')) {
                $tipo_recapito = tipo_recapito_model::where('tipo', $request->get('tipo_recapito'))->firstOrFail();
                $recapito_model->id_tipo_recapito = $tipo_recapito->id_tipo_recapito;
            }

            if ($request->has('recapito')) {
                $recapito_model->recapito = $request->get('recapito');
            }

            if ($request->has('id_contatto')) {
                $new_contatto = $request->get('id_contatto');
                $contatto_exists = contatto_model::where('id_contatto', $new_contatto)->exists();

                if ($contatto_exists) {
                    $recapito_model->id_contatto = $new_contatto;
                } else {
                    return response()->json(['message' => 'Nuovo contatto non valido'], 400);
                }
            }

            $recapito_model->save();

            return new recapito_resource($recapito_model);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di aggiornare questo recapito.");
    }





    public function destroy($contatto, $recapito)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può eliminare qualsiasi recapito
        if (Gate::allows('ruolo', 'amministratore') || ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$contatto)) {
            $recapito_model = recapito_model::where('id_contatto', $contatto)
                ->where('id_recapito', $recapito)
                ->firstOrFail();

            $recapito_model->delete();

            return response()->json(['message' => 'Recapito eliminato con successo.'], 204);
        }

        // Se non autorizzato, restituisce un errore 403
        abort(403, "ATTENZIONE: Non hai il permesso di eliminare questo recapito.");
    }




}
