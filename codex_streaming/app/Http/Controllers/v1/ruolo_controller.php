<?php

namespace App\Http\Controllers\v1;

use App\Helpers\app_helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\contatto_resource;
use App\Http\Resources\v1\ruolo_collection;
use App\Http\Resources\v1\ruolo_resource;
use App\Models\ruolo_model;
use Illuminate\Http\Request;

class ruolo_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        {
        app_helpers::gestisci_sessione($request);

            $risorsa = ruolo_model::all();
            $ritorno = new ruolo_collection(($risorsa));
            return $ritorno;
        }
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
    public function show(Request $request,ruolo_model $ruolo)
    {
        app_helpers::gestisci_sessione($request);
        $risorsa = new ruolo_resource($ruolo);
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
