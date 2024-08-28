<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\contatto_store_request;
use App\Http\Requests\v1\contatto_update_request;
use App\Http\Requests\v1\registrazione_store_request;
use App\Http\Resources\v1\contatto_collection;
use App\Http\Resources\v1\contatto_resource;
use App\Models\contatto_model;
use App\Models\password_model;
use App\Models\recapito_model;
use App\Models\sessione_model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class contatto_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $risorsa = contatto_model::all();
        $ritorno = new contatto_collection(($risorsa));
        return $ritorno;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(contatto_store_request $request)
    {

        $dati = $request->validated();
        $contatto_utente = contatto_model::create($dati);

        $token = $request->bearerToken();

        $contatto_autenticato = sessione_model::where('token', $token)->first();

        if ($contatto_autenticato) {
            sessione_model::elimina_sessione($contatto_autenticato->id_contatto);
            sessione_model::aggiorna_sessione($contatto_autenticato->id_contatto, $token);
        }

        return new contatto_resource($contatto_utente);
    }




    public function show(contatto_model $contatto)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può vedere qualsiasi contatto
        if (Gate::allows('ruolo', 'amministratore')) {
            $risorsa = new contatto_resource($contatto);
            return $risorsa;
        }

        // Se l'utente non è amministratore, può vedere solo il proprio contatto
        if ($utenteAutenticato->id_contatto === $contatto->id_contatto) {
            $risorsa = new contatto_resource($contatto);
            return $risorsa;
        }

        abort(403, "ATTENZIONE: Non hai il permesso di visualizzare questo contatto.");
    }









    public function registrazione(registrazione_store_request $request)
    {
        $dati = $request->validated();

        $contatto = new contatto_model();
        $contatto->fill($dati);
        $contatto->save();

        recapito_model::create([
            'id_contatto' => $contatto->id_contatto,
            'id_tipo_recapito' => 3,
            'recapito' => $dati['email'],
        ]);

        password_model::create([
            'id_contatto' => $contatto->id_contatto,
            'password' => hash('sha512', $dati['password']),
            'sale' => null,
        ]);

        return response()->json([
            'message' => 'Registrazione avvenuta con successo',
            'contatto' => $contatto,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(contatto_update_request $request, contatto_model $contatto)
    {
        $dati = $request->validated();
        $contatto->fill($dati);
        $contatto->save();
        return new contatto_resource($contatto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contatto_model $contatto)
{
    $utenteAutenticato = Auth::user();

    // Se l'utente è amministratore, può cancellare qualsiasi contatto
    if (Gate::allows('ruolo', 'amministratore')) {
        $contatto->deleteOrFail();
        return response()->noContent();
    }

    // Se l'utente non è amministratore, può cancellare solo il proprio contatto
    if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$contatto->id_contatto) {
        $contatto->deleteOrFail();
        return response()->noContent();
    }

    // Se non autorizzato, restituisce un errore 403
    abort(403, "ATTENZIONE: Non hai il permesso di cancellare questo contatto.");
}

}
