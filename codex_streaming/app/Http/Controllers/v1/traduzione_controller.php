<?php

namespace App\Http\Controllers\v1;

use App\Helpers\app_helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\traduzione_collection;
use App\Http\Resources\v1\traduzione_custom_collection;
use App\Http\Resources\v1\traduzione_unita_collection;
use App\Models\traduzione_model;
use App\Models\traduzione_unita_model;
use App\Models\traduzioni_custom_model;
use Illuminate\Http\Request;

class traduzione_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    public function show(Request $request)
{
    app_helpers::gestisci_sessione($request);

    // Recupero i parametri della query
    $tipo = $request->query('tipo');
    $sigla_lingua = $request->query('sigla');
    $riferimento = $request->query('riferimento');

    // Lista delle query valide
    $validQueries = ['tipo', 'sigla', 'riferimento'];

    // Verifico la presenza di chiavi non valide nella query string
    foreach ($request->query() as $key => $value) {
        if (!in_array($key, $validQueries)) {
            abort(400, 'ATTENZIONE: QUERRY NON VALIDA');
        }
    }

    // Validazione del tipo di traduzione
    if (!in_array($tipo, ['custom', 'unita', null])) {
        abort(400, 'ATTENZIONE: QUERRY NON VALIDA');
    }

    // Inizializzazione della query in base al tipo
    if ($tipo === 'custom') {
        $query = traduzioni_custom_model::query();
    } elseif ($tipo === 'unita') {
        $query = traduzione_unita_model::query();
    } else {
        $query = traduzione_model::query();
    }

    // Filtra per lingua se specificato
    if ($sigla_lingua) {
        $query->whereHas('lingue', function ($q) use ($sigla_lingua) {
            $q->where('codice', $sigla_lingua);
        });
    }

    // Filtro per riferimento se specificato
    if ($riferimento) {
        $query->where('riferimento', $riferimento);
    }

    // Recupero le traduzioni filtrate
    $traduzioni = $query->get();

    // Verifico se la query restituisce risultati vuoti
    if ($traduzioni->isEmpty()) {
        abort(400, 'ATTENZIONE: QUERY NON VALIDA');
    }

    // Restituisco la collezione in base al tipo
    if ($tipo === 'custom') {
        return new traduzione_custom_collection($traduzioni);
    } elseif ($tipo === 'unita') {
        return new traduzione_unita_collection($traduzioni);
    } else {
        return new traduzione_collection($traduzioni);
    }
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
