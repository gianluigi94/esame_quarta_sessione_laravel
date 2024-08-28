<?php

namespace App\Http\Controllers\v1;

use App\Helpers\app_helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\comune_collection;
use App\Http\Resources\v1\comune_resource;
use App\Models\comune_italiano_model;
use Illuminate\Http\Request;

class comune_italiano_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        app_helpers::gestisci_sessione($request);
        $risorsa = comune_italiano_model::all();
        $ritorno = new comune_collection(($risorsa));
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
    public function show(Request $request, $comune)
    {
        app_helpers::gestisci_sessione($request);
        // Verifico se il parametro è una sigla automobilistica
        if (strlen($comune) === 2 && ctype_alpha($comune)) {
            // Se è una sigla automobilistica, reindirizzo alla funzione provincia
            return $this->provincia($request, $comune);
        } else {
            // Cerco il comune per ID o per nome
            $comune = comune_italiano_model::where('id_comune_italiano', $comune)
                ->orWhere('comune', $comune)
                ->firstOrFail();


            $risorsa = new comune_resource($comune);
            return $risorsa;
        }
    }

    public function provincia(Request $request, $sigla_automobilistica)
    {
        app_helpers::gestisci_sessione($request);

        // Cerco i comuni che hanno la sigla automobilistica corrispondente
        $comuni = comune_italiano_model::where('sigla_automobilistica', $sigla_automobilistica)->get();

        // Verifico se esistono comuni con quella sigla automobilistica
        if ($comuni->isEmpty()) {
            return response()->json(['message' => 'Nessun comune trovato per questa sigla automobilistica'], 404);
        }

        return comune_resource::collection($comuni);
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
