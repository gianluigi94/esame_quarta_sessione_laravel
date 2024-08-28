<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\transazione_store_request;
use App\Http\Resources\v1\transazione_resource;
use App\Models\credito_model;
use App\Models\transazione_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class transazione_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_contatto)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può vedere le transazioni di qualsiasi contatto
        if (Gate::allows('ruolo', 'amministratore')) {
            $transazioni = transazione_model::join('crediti', 'transazioni.id_credito', '=', 'crediti.id_credito')
                ->where('crediti.id_contatto', $id_contatto)
                ->select('transazioni.*')
                ->get();

            return transazione_resource::collection($transazioni);
        }

        // Se l'utente non è amministratore, può vedere solo le proprie transazioni
        if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto) {
            $transazioni = transazione_model::join('crediti', 'transazioni.id_credito', '=', 'crediti.id_credito')
                ->where('crediti.id_contatto', $id_contatto)
                ->select('transazioni.*')
                ->get();

            return transazione_resource::collection($transazioni);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di visualizzare queste transazioni.");
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(transazione_store_request $request, $id_contatto)
{
    $utenteAutenticato = Auth::user();

    // Se l'utente è amministratore, può creare una transazione per qualsiasi contatto
    if (Gate::allows('ruolo', 'amministratore') || ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto)) {
        $credito = credito_model::where('id_contatto', $id_contatto)->firstOrFail();

        $transazione = new transazione_model();
        $transazione->id_credito = $credito->id_credito;
        $transazione->successo = 1;
        $transazione->importo = $request->input('importo');
        $transazione->save();

        return new transazione_resource($transazione);
    }

    // Se non autorizzato, restituisce un errore 403
    abort(403, "ATTENZIONE: Non hai il permesso di creare una transazione per questo contatto.");
}




    /**
     * Display the specified resource.
     */
    public function show($id_contatto, $id_transazione)
{
    $utenteAutenticato = Auth::user();

    // Se l'utente è amministratore, può vedere qualsiasi transazione
    if (Gate::allows('ruolo', 'amministratore')) {
        $transazione = transazione_model::where('id_transazione', $id_transazione)
            ->whereHas('credito', function ($query) use ($id_contatto) {
                $query->where('id_contatto', $id_contatto);
            })
            ->with('credito')
            ->firstOrFail();

        return new transazione_resource($transazione);
    }

    // Se l'utente non è amministratore, può vedere solo le proprie transazioni
    if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto) {
        $transazione = transazione_model::where('id_transazione', $id_transazione)
            ->whereHas('credito', function ($query) use ($id_contatto) {
                $query->where('id_contatto', $id_contatto);
            })
            ->with('credito')
            ->firstOrFail();

        return new transazione_resource($transazione);
    }

    // Se non autorizzato, restituisce un errore 403
    abort(403, "ATTENZIONE: Non hai il permesso di visualizzare questa transazione.");
}





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_contatto, $id_transazione)
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
