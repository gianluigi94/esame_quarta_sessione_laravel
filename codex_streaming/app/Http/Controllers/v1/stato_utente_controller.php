<?php

namespace App\Http\Controllers\v1;

use App\Helpers\app_helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\categoria_store_request;
use App\Http\Requests\v1\categoria_update_request;
use App\Http\Resources\v1\categoria_collection;
use App\Http\Resources\v1\categoria_resource;
use App\Http\Resources\v1\stato_utente_collection;
use App\Http\Resources\v1\stato_utente_resource;
use App\Models\categoria_model;
use App\Models\stato_utente_model;
use Illuminate\Http\Request;

class stato_utente_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        app_helpers::gestisci_sessione($request);
        $risorsa = stato_utente_model::all();
        $ritorno = new stato_utente_collection(($risorsa));
        return $ritorno;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,stato_utente_model $stato)
    {
        app_helpers::gestisci_sessione($request);
        $risorsa = new stato_utente_resource($stato);
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoria_update_request $request, categoria_model $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoria_model $categoria)
    {
        //
    }

}
