<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\episodio_store_request;
use App\Http\Requests\v1\episodio_update_request;
use App\Http\Requests\v1\serie_store_request;
use App\Http\Requests\v1\serie_update_request;
use App\Http\Requests\v1\stagione_store_request;
use App\Http\Resources\v1\episodio_collection;
use App\Http\Resources\v1\episodio_resource;
use App\Http\Resources\v1\serie_collection;
use App\Http\Resources\v1\serie_resource;
use App\Http\Resources\v1\stagione_collection;
use App\Http\Resources\v1\stagione_resource;
use App\Models\episodio_model;
use App\Models\serie_model;
use App\Models\stagione_model;

class serie_controller extends Controller
{
    public function index()
    {
        $risorsa = serie_model::all();
        $ritorno = new serie_collection($risorsa);
        return $ritorno;
    }

    public function stagioni($id_serie)
    {
        $risorsa = stagione_model::where('id_serie', $id_serie)->get();

        $ritorno = new stagione_collection($risorsa);
        return $ritorno;
    }

    public function episodi($id_serie, $numero_stagione)
    {
        $risorsa = episodio_model::where('id_serie', $id_serie)
            ->where('numero_stagione', $numero_stagione)->get();


        $ritorno = new episodio_collection($risorsa);
        return $ritorno;
    }
    public function episodio_singolo($id_serie, $numero_stagione, $numero_episodio)
    {
        $risorsa = episodio_model::where('id_serie', $id_serie)
            ->where('numero_stagione', $numero_stagione)
            ->where('numero_episodio', $numero_episodio)->get();


        $ritorno = new episodio_collection($risorsa);
        return $ritorno;
    }


    public function stagione_singola($id_serie, $numero_stagione)
    {
        $stagione = stagione_model::where('id_serie', $id_serie)
            ->where('numero_stagione', $numero_stagione)
            ->firstOrFail();

        return new stagione_resource($stagione);
    }


    public function nuova_stagione(stagione_store_request $request, $id_serie)
    {
        // Ottiengo i dati validati dalla richiesta
        $dati = $request->validated();

        // Trovo il numero di stagione più alto per la serie
        $ultimo_numero_stagione = stagione_model::where('id_serie', $id_serie)->max('numero_stagione');

        // Imposto il nuovo numero di stagione
        $dati['numero_stagione'] = $ultimo_numero_stagione + 1;

        // Imposto l'id_serie
        $dati['id_serie'] = $id_serie;

        // Imposto totale_episodi a 0 se non presente
        $dati['totale_episodi'] = $dati['totale_episodi'] ?? 0;

        // Creo la nuova stagione
        $stagione = stagione_model::create($dati);

        // Trovo la serie corrispondente e incrementa il totale delle stagioni
        $serie = serie_model::find($id_serie);
        $serie->increment('totale_stagioni');

        // Ritorno la risorsa della stagione appena creata
        return new stagione_resource($stagione);
    }





    public function nuovo_episodio(episodio_store_request $request, $serie, $numero_stagione)
    {
        // Ottiengo i dati validati dalla richiesta
        $dati = $request->validated();

        // Trovo la stagione corrispondente
        $stagione = stagione_model::where('id_serie', $serie)
            ->where('numero_stagione', $numero_stagione)
            ->firstOrFail();

        // Preparo i dati per il nuovo episodio
        $dati['id_serie'] = $serie;
        $dati['id_stagione'] = $stagione->id_stagione;
        $dati['numero_stagione'] = $stagione->numero_stagione;

        // Trovo il numero di episodio più alto nella stagione e aggiungi 1
        $ultimo_numero_episodio = episodio_model::where('id_serie', $serie)
            ->where('numero_stagione', $numero_stagione)
            ->max('numero_episodio');
        $dati['numero_episodio'] = $ultimo_numero_episodio + 1;

        // Creo il nuovo episodio
        $episodio = episodio_model::create($dati);

        // Incremento il totale_episodi nella tabella serie
        $serie_model = serie_model::find($serie);
        if ($serie_model) {
            $serie_model->increment('totale_episodi');
        }

        // Incremento il totale_episodi nella tabella stagioni
        $stagione->increment('totale_episodi');

        // Ritorno la risorsa del nuovo episodio
        return new episodio_resource($episodio);
    }






    public function modifica_stagione(serie_update_request $request, $id_serie, $numero_stagione)
    {
        // Trovo la stagione per il numero di stagione e serie
        $stagione = stagione_model::where('numero_stagione', $numero_stagione)
            ->where('id_serie', $id_serie)
            ->firstOrFail();

        // Ottengo i dati validati dalla richiesta
        $dati = $request->validated();

        // Se la richiesta contiene un nuovo id_serie, aggiorno la serie e imposta il numero_stagione più alto + 1
        if ($request->has('id_serie') && $request->get('id_serie') != $stagione->id_serie) {
            $nuovo_id_serie = $request->get('id_serie');

            // Trovo la serie di origine
            $serie_origine = serie_model::find($stagione->id_serie);

            // Trovo il numero di stagione più alto per la nuova serie
            $ultimo_numero_stagione = stagione_model::where('id_serie', $nuovo_id_serie)
                ->max('numero_stagione');

            // Imposto la nuova serie e il nuovo numero di stagione
            $stagione->id_serie = $nuovo_id_serie;
            $stagione->numero_stagione = $ultimo_numero_stagione + 1;

            // Trovo tutti gli episodi della stagione spostata
            $episodi = episodio_model::where('id_serie', $id_serie)
                ->where('numero_stagione', $numero_stagione)
                ->get();

            // Conta il numero di episodi spostati
            $numero_episodi_spostati = $episodi->count();

            // Aggiorno il totale_stagioni e totale_episodi della serie di origine
            if ($serie_origine) {
                $serie_origine->decrement('totale_stagioni');
                $serie_origine->decrement('totale_episodi', $numero_episodi_spostati);
            }

            // Aggiorno il totale_stagioni e totale_episodi della nuova serie (aumenta di uno)
            $serie_destinazione = serie_model::find($nuovo_id_serie);
            if ($serie_destinazione) {
                $serie_destinazione->increment('totale_stagioni');
                $serie_destinazione->increment('totale_episodi', $numero_episodi_spostati);
            }

            // Aggiorno gli episodi spostati
            foreach ($episodi as $episodio) {
                $episodio->id_serie = $nuovo_id_serie;
                $episodio->numero_stagione = $stagione->numero_stagione;
                $episodio->save();
            }
        }

        // Aggiorno la stagione con i dati forniti
        $stagione->fill($dati);
        $stagione->save();

        // Ritorno la risorsa aggiornata della stagione
        return new stagione_resource($stagione);
    }





    public function modifica_episodio(episodio_update_request $request, $id_serie, $numero_stagione, $numero_episodio)
    {
        // Trovo l'episodio corrente in base alla serie, stagione e numero episodio
        $episodio = episodio_model::where('numero_stagione', $numero_stagione)
            ->where('id_serie', $id_serie)
            ->where('numero_episodio', $numero_episodio)
            ->firstOrFail();

        // Ottiengo i dati validati dalla richiesta
        $dati = $request->validated();

        // Se l'id_serie o il numero_stagione cambiano, aggiorno il numero_episodio e i conteggi
        if (($request->has('id_serie') && $request->get('id_serie') != $episodio->id_serie) ||
            ($request->has('numero_stagione') && $request->get('numero_stagione') != $episodio->numero_stagione)
        ) {

            $vecchia_serie = serie_model::find($episodio->id_serie);
            $vecchia_stagione = stagione_model::where('id_serie', $episodio->id_serie)
                ->where('numero_stagione', $episodio->numero_stagione)
                ->first();

            $nuovo_id_serie = $request->get('id_serie', $episodio->id_serie);
            $nuovo_numero_stagione = $request->get('numero_stagione', $episodio->numero_stagione);

            // Trovo il numero di episodio più alto per la nuova serie e stagione, e aumentalo di 1
            $ultimo_numero_episodio = episodio_model::where('id_serie', $nuovo_id_serie)
                ->where('numero_stagione', $nuovo_numero_stagione)
                ->max('numero_episodio');

            // Imposto il nuovo numero di episodio incrementato di 1
            $episodio->numero_episodio = $ultimo_numero_episodio + 1;
            $episodio->id_serie = $nuovo_id_serie;
            $episodio->numero_stagione = $nuovo_numero_stagione;

            // Trovo la nuova serie e la nuova stagione
            $nuova_serie = serie_model::find($nuovo_id_serie);
            $nuova_stagione = stagione_model::where('id_serie', $nuovo_id_serie)
                ->where('numero_stagione', $nuovo_numero_stagione)
                ->first();

            // Aggiorno il totale episodi nella vecchia stagione e serie
            if ($vecchia_stagione) {
                $vecchia_stagione->decrement('totale_episodi');
            }
            if ($vecchia_serie) {
                $vecchia_serie->decrement('totale_episodi');
            }

            // Aggiorno il totale episodi nella nuova stagione e serie
            if ($nuova_stagione) {
                $nuova_stagione->increment('totale_episodi');
            }
            if ($nuova_serie) {
                $nuova_serie->increment('totale_episodi');
            }

            // Se la stagione cambia tra serie diverse, aggiorno anche il totale_stagioni
            if ($request->has('id_serie') && $request->get('id_serie') != $episodio->id_serie) {
                if ($vecchia_serie && $vecchia_stagione && !$vecchia_stagione->episodi()->exists()) {
                    $vecchia_serie->decrement('totale_stagioni');
                }
                if ($nuova_serie && !$nuova_stagione->episodi()->exists()) {
                    $nuova_serie->increment('totale_stagioni');
                }
            }
        }

        // Aggiorno l'episodio con i dati forniti
        $episodio->fill($dati);
        $episodio->save();

        // Ritorno la risorsa aggiornata dell'episodio
        return new episodio_resource($episodio);
    }






    public function elimina_stagione($id_serie, $numero_stagione)
    {
        // Trovo la stagione da eliminare
        $stagione = stagione_model::where('id_serie', $id_serie)
            ->where('numero_stagione', $numero_stagione)
            ->firstOrFail();

        // Conta gli episodi presenti nella stagione da eliminare
        $numero_episodi_da_eliminare = episodio_model::where('id_stagione', $stagione->id_stagione)->count();

        // Imposto il numero_stagione a null prima di eliminarla
        $stagione->numero_stagione = null;
        $stagione->save();

        // Elimina la stagione
        $stagione->delete();

        // Aggiorno il totale_stagioni e totale_episodi nella tabella serie
        $serie = serie_model::findOrFail($id_serie);
        $serie->decrement('totale_stagioni');
        $serie->decrement('totale_episodi', $numero_episodi_da_eliminare);

        // Imposto a null il numero_stagione per tutti gli episodi corrispondenti alla stagione eliminata
        episodio_model::where('id_stagione', $stagione->id_stagione)->update(['numero_stagione' => null]);

        // Ricalcola i numeri delle stagioni rimanenti nella serie
        $stagioni_rimanenti = stagione_model::where('id_serie', $id_serie)
            ->whereNotNull('numero_stagione')
            ->orderBy('numero_stagione', 'asc')
            ->get();

        // Rinumerazione delle stagioni rimanenti
        $nuovo_numero = 1;
        foreach ($stagioni_rimanenti as $stagione_rimasta) {
            // Aggiorno il numero_stagione di ogni stagione rimanente
            $stagione_rimasta->numero_stagione = $nuovo_numero;
            $stagione_rimasta->save();

            // Aggiorno il numero_stagione per tutti gli episodi di questa stagione
            episodio_model::where('id_stagione', $stagione_rimasta->id_stagione)
                ->update(['numero_stagione' => $nuovo_numero]);

            $nuovo_numero++;
        }

        return response()->noContent();
    }




    public function elimina_episodio($id_serie, $numero_stagione, $numero_episodio)
    {
        // Trovo l'episodio da eliminare
        $episodio = episodio_model::where('id_serie', $id_serie)
            ->where('numero_stagione', $numero_stagione)
            ->where('numero_episodio', $numero_episodio)
            ->firstOrFail();

        // Soft delete dell'episodio e imposto numero_episodio a null
        $episodio->numero_episodio = null;
        $episodio->save();
        $episodio->delete();

        // Trovo la stagione e la serie corrispondente
        $stagione = stagione_model::where('id_serie', $id_serie)
            ->where('numero_stagione', $numero_stagione)
            ->firstOrFail();
        $serie = serie_model::findOrFail($id_serie);

        // Decrementa il totale_episodi nella tabella serie e stagione
        $stagione->decrement('totale_episodi');
        $serie->decrement('totale_episodi');

        // Trova tutti gli episodi non eliminati della stessa stagione, ordinati per numero_episodio
        $episodi = episodio_model::where('id_serie', $id_serie)
            ->where('numero_stagione', $numero_stagione)
            ->whereNotNull('numero_episodio') // Considera solo gli episodi con numero_episodio non null
            ->orderBy('numero_episodio', 'asc')
            ->get();

        // Ricalcola i numeri degli episodi rimasti
        $nuovo_numero = 1;
        foreach ($episodi as $episodio_rimasto) {
            // Aggiorno il numero dell'episodio
            $episodio_rimasto->numero_episodio = $nuovo_numero;
            $episodio_rimasto->save();
            $nuovo_numero++;
        }

        return response()->noContent();
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(serie_store_request $request)
    {
        // Ottieni i dati validati dalla richiesta
        $dati = $request->validated();

        // Imposto i valori di default per 'totale_stagioni' e 'totale_episodi' se non presenti
        $dati['totale_stagioni'] = $dati['totale_stagioni'] ?? 0;
        $dati['totale_episodi'] = $dati['totale_episodi'] ?? 0;

        // Crea una nuova serie con i dati
        $serie = serie_model::create($dati);

        // Ritorno la risorsa della serie appena creata
        return new serie_resource($serie);
    }


    /**
     * Display the specified resource.
     */
    public function show(serie_model $serie)
    {
        $risorsa = new serie_resource($serie);
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(serie_update_request $request, serie_model $serie)
    {
        $dati = $request->validated();
        $serie->fill($dati);
        $serie->save();
        return new serie_resource($serie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(serie_model $serie)
    {
        $serie->deleteOrFail();
        return response()->noContent();
    }
}
