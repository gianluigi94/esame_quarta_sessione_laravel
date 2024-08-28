<?php

namespace App\Http\Controllers\v1;

use App\Helpers\app_helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\lingua_collection;
use App\Http\Resources\v1\lingua_resource;
use App\Models\lingua_model;
use Illuminate\Http\Request;

class lingua_controller extends Controller
{
    /**
     * serve per mostrate in formato json la lista delle lingue
     *
     * @param Request
     *
     * @return jsonResource di lingua_collection.
     */
    public function index(Request $request)
    {

        app_helpers::gestisci_sessione($request); // se un token è inserito aggiorna inizio sessione di quell'utente
        $risorsa = lingua_model::all();
        $ritorno = new lingua_collection(($risorsa));
        return $ritorno;
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
     *
     * Questo metodo gestisce la visualizzazione di una lingua specifica basato sulla sigla della lingua
     *
     * @param Request
     * @param string $lingua è il codice della lingua (stringa).
     * @return jsonResource lingua_resource Restituisce una singola risorsa lingua come risposta JSON.
     *
     */
    public function show(Request $request, $lingua) // se un token è inserito aggiorna inizio sessione di quell'utente
    {
        app_helpers::gestisci_sessione($request);

        $lingua = lingua_model::where('id_lingua', $lingua)
            ->orWhere('codice', $lingua)
            ->first();

        if (!$lingua) {
            abort(404, 'ATTENZIONE: lingua non trovata');
        }

        $risorsa = new lingua_resource($lingua);
        return $risorsa;
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
