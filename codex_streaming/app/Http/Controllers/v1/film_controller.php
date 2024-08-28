<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\film_store_request;
use App\Http\Requests\v1\film_update_request;
use App\Http\Resources\v1\film_collection;
use App\Http\Resources\v1\film_resource;
use App\Models\film_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class film_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupero tutti i film
        $risorsa = film_model::all();

        // Filtra i film in base al ruolo dell'utente
        $risorsa_Filtrata = $risorsa->filter(function ($film) {
            // Se l'ID del film è 2, verifica se l'utente è un amministratore
            if ($film->id_film == 2 && !Gate::allows('ruolo', 'amministratore')) {
                return false; // Nascondi il film se l'utente non è amministratore
            }
            return true; // Mostra tutti gli altri film
        });

        // Restituisco la collezione filtrata
        $ritorno = new film_collection($risorsa_Filtrata);
        return $ritorno;
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(film_store_request $request)
    {
        $dati = $request->validated();
        $film = film_model::create($dati);
        return new film_resource($film);
    }


    /**
     * Display the specified resource.
     */

     public function show(Request $request, $film)
     {
         $risorsa = film_model::find($film);

         // Controllo se l'ID del film è 2 e verifica se l'utente è un amministratore
         if ($risorsa->id_film == 2 && !Gate::allows('ruolo', 'amministratore')) {
             abort(403, "ATTENZIONE: Non hai il permesso di vedere questo film.");
         }

         // Se l'utente è autorizzato, restituisco la risorsa del film
         $ritorno = new film_resource($risorsa);
         return $ritorno;
     }



    /**
     * Update the specified resource in storage.
     */
    public function update(film_update_request $request, film_model $film)
    {
        $dati = $request->validated();
        $film->fill($dati);
        $film->save();
        return new film_resource($film);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(film_model $film)
    {
        $film->deleteOrFail();
        return response()->noContent();
    }
}
