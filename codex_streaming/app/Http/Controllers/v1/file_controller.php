<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\file_store_request;
use App\Http\Requests\v1\file_update_request;
use App\Http\Resources\v1\file_collection;
use App\Http\Resources\v1\file_resource;
use App\Models\file_model;
use Illuminate\Http\Request;

class file_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tipo = $request->query('tipo');

        $query = file_model::query();

        if ($tipo) {
            if ($tipo === 'video_film') {
                $query->whereHas('video_film');
            } elseif ($tipo === 'locandina') {
                $query->whereHas('locandina');
            } elseif ($tipo === 'video_episodio') {
                $query->whereHas('video_episodio');
            } elseif ($tipo === 'trailer') {
                $query->whereHas('trailer');
            } else {
                abort(404, 'ATTENZIONE: TIPO FILE NON TROVATO');
            }
        }

        $risorsa = $query->get();


        $ritorno = new file_collection($risorsa);
        return $ritorno;
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(file_store_request $request)
{
    // Estraggo i dati validati
    $dati = $request->validated();

    // Creo il record nella tabella 'file'
    $file = file_model::create([
        'nome' => $dati['nome'],
        'percorso' => $dati['percorso'],
        'dimensione' => $dati['dimensione']
    ]);

    // Salvo anche nella tabella corrispondente in base al tipo
    if ($dati['tipo'] === 'locandina') {
        $file->locandina()->create([
            'id_file' => $file->id_file,
            'nome' => $dati['nome'], // Passo il campo 'nome' anche qui
        ]);
    } elseif ($dati['tipo'] === 'video_film') {
        $file->video_film()->create([
            'id_file' => $file->id_file,
            'nome' => $dati['nome'],
        ]);
    } elseif ($dati['tipo'] === 'video_episodio') {
        $file->video_episodio()->create([
            'id_file' => $file->id_file,
            'nome' => $dati['nome'],
        ]);
    } elseif ($dati['tipo'] === 'trailer') {
        $file->trailer()->create([
            'id_file' => $file->id_file,
            'nome' => $dati['nome'],
        ]);
    }

    return new file_resource($file);
}



    /**
     * Display the specified resource.
     */
    public function show(file_model $file)
    {
        $risorsa = new file_resource($file);
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(file_update_request $request, file_model $file)
    {
        $dati = $request->validated();

        // Aggiorno i dati del file
        $file->update(array_filter([
            'nome' => $dati['nome'] ?? $file->nome,
            'percorso' => $dati['percorso'] ?? $file->percorso,
            'dimensione' => $dati['dimensione'] ?? $file->dimensione,
        ]));

        // Gestione del tipo di file
        if (isset($dati['tipo'])) {
            // Elimino la relazione esistente se presente anche se c'è soft
            if ($file->locandina) {
                $file->locandina()->forceDelete();
            } elseif ($file->video_film) {
                $file->video_film()->forceDelete();
            } elseif ($file->video_episodio) {
                $file->video_episodio()->forceDelete();
            } elseif ($file->trailer) {
                $file->trailer()->forceDelete();
            }

            // Creo la nuova relazione in base al tipo
            if ($dati['tipo'] === 'locandina') {
                $file->locandina()->create([
                    'id_file' => $file->id_file,
                    'nome' => $file->nome,
                ]);
            } elseif ($dati['tipo'] === 'video_film') {
                $file->video_film()->create([
                    'id_file' => $file->id_file,
                    'nome' => $file->nome,
                ]);
            } elseif ($dati['tipo'] === 'video_episodio') {
                $file->video_episodio()->create([
                    'id_file' => $file->id_file,
                    'nome' => $file->nome,
                ]);
            } elseif ($dati['tipo'] === 'trailer') {
                $file->trailer()->create([
                    'id_file' => $file->id_file,
                    'nome' => $file->nome,
                ]);
            }
        }

        // Ricarioa le relazioni per riflettere le modifiche appena apportate
        $file->load(['locandina', 'video_film', 'video_episodio', 'trailer']);

        return new file_resource($file);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(file_model $file)
{
    if ($file->locandina) {
        $file->locandina()->delete();
    } elseif ($file->video_film) {
        $file->video_film()->delete();
    } elseif ($file->video_episodio) {
        $file->video_episodio()->delete();
    } elseif ($file->trailer) {
        $file->trailer()->delete();
    }

    $file->deleteOrFail();

    return response()->noContent();
}

}
