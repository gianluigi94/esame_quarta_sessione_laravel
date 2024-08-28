<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\categoria_store_request;
use App\Http\Requests\v1\categoria_update_request;
use App\Http\Resources\v1\categoria_collection;
use App\Http\Resources\v1\categoria_resource;
use App\Models\categoria_model;
use App\Models\film_model;
use App\Models\serie_model;
use Illuminate\Http\Request;

class categoria_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $risorsa = categoria_model::all();
        $ritorno = new categoria_collection(($risorsa));
        return $ritorno;
    }

     /**
     * Display the specified resource.
     */
    public function show(categoria_model $categoria)
    {
        $risorsa = new categoria_resource($categoria);
        return $risorsa;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoria_store_request $request)
    {
        $dati=$request->validated();
        $categoria_utente=categoria_model::create($dati);
        return new categoria_resource($categoria_utente);
    }



    public function contenuti(categoria_model $categoria, $tipo)
{
    // Verifico il tipo richiesto: film o serie
    if ($tipo === 'film') {
        $contenuti = film_model::where('id_categoria', $categoria->id_categoria)->get();
    } elseif ($tipo === 'serie') {
        $contenuti = serie_model::where('id_categoria', $categoria->id_categoria)->get();
    } else {
        abort(400, 'Specifica un tipo di contenuto valido: film o serie.');

    }

    return $contenuti;
}



    /**
     * Update the specified resource in storage.
     */
    public function update(categoria_update_request $request, categoria_model $categoria)
    {
        $dati=$request->validated();
        $categoria->fill($dati);
        $categoria->save();
        return new categoria_resource($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoria_model $categoria)
    {
        $categoria->deleteOrFail();
        return response()->noContent();
    }

}
