<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\credito_resource;
use App\Models\credito_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class credito_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_contatto)
{
    // Recupero l'utente autenticato
    $utenteAutenticato = Auth::user();

    // Se l'utente è amministratore, può vedere qualsiasi credito
    if (Gate::allows('ruolo', 'amministratore')) {
        $credito = credito_model::where('id_contatto', $id_contatto)->firstOrFail();
        return new credito_resource($credito);
    }

    // Se l'utente non è amministratore, può vedere solo il proprio credito
    if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto) {
        $credito = credito_model::where('id_contatto', $id_contatto)->firstOrFail();
        return new credito_resource($credito);
    }

    // Se l'utente non ha il permesso di visualizzare il credito
    abort(403, "ATTENZIONE: Non hai il permesso di visualizzare questo credito.");
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
    public function show(string $id)
    {
        //
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
