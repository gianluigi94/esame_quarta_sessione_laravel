<?php

namespace App\Http\Controllers\v1;

use App\Helpers\app_helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\nazione_collection;
use App\Http\Resources\v1\nazione_resource;
use App\Models\nazione_model;
use Illuminate\Http\Request;

class nazione_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        app_helpers::gestisci_sessione($request);
        $risorsa = nazione_model::all();
        $ritorno = new nazione_collection(($risorsa));
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
     */
    public function show(Request $request, $nazione)
    {
        app_helpers::gestisci_sessione($request);

        // Verifico se il parametro è una sigla automobilistica (due lettere)
        if (strlen($nazione) === 2 && ctype_alpha($nazione)) {
            // Se è una sigla automobilistica, richiama la logica per il continente
            return $this->continente($request, $nazione);
        } else {
            // Cercot la nazione per ID o per sigla ISO3
            $nazione = nazione_model::where('id_nazione', $nazione)
                ->orWhere('iso3', $nazione)
                ->firstOrFail();

            // Restituisce la nazione trovata come risorsa
            $risorsa = new nazione_resource($nazione);
            return $risorsa;
        }
    }

    public function continente(Request $request,$continente)
    {
        app_helpers::gestisci_sessione($request);
        // Cerco tutte le nazioni che appartengono al continente dato
        $continenti = nazione_model::where('continente', $continente)->get();

        // Restituisco una collezione di risorse
        return nazione_resource::collection($continenti);
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
