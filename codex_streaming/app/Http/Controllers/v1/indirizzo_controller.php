<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\indirizzo_store_request;
use App\Http\Requests\v1\indirizzo_update_request;
use App\Http\Resources\v1\indirizzo_collection;
use App\Http\Resources\v1\indirizzo_resource;
use App\Models\comune_italiano_model;
use App\Models\contatto_model;
use App\Models\indirizzo_model;
use App\Models\nazione_model;
use App\Models\tipo_indirizzo_model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class indirizzo_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_contatto)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può vedere gli indirizzi di qualsiasi contatto
        if (Gate::allows('ruolo', 'amministratore')) {
            $risorsa = indirizzo_model::where('id_contatto', $id_contatto)
                ->with(['nazione', 'comune_italiano', 'tipo_indirizzo'])
                ->get();

            return new indirizzo_collection($risorsa);
        }

        // Se l'utente non è amministratore, può vedere solo i propri indirizzi
        if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto) {
            $risorsa = indirizzo_model::where('id_contatto', $id_contatto)
                ->with(['nazione', 'comune_italiano', 'tipo_indirizzo'])
                ->get();

            return new indirizzo_collection($risorsa);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di visualizzare questi indirizzi.");
    }



    public function show($id_contatto, $id_indirizzo)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può vedere qualsiasi indirizzo
        if (Gate::allows('ruolo', 'amministratore')) {
            $risorsa = indirizzo_model::where('id_contatto', $id_contatto)
                ->where('id_indirizzo', $id_indirizzo)
                ->with(['nazione', 'comune_italiano', 'tipo_indirizzo'])
                ->firstOrFail();

            return new indirizzo_resource($risorsa);
        }

        // Se l'utente non è amministratore, può vedere solo i propri indirizzi
        if ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto) {
            $risorsa = indirizzo_model::where('id_contatto', $id_contatto)
                ->where('id_indirizzo', $id_indirizzo)
                ->with(['nazione', 'comune_italiano', 'tipo_indirizzo'])
                ->firstOrFail();

            return new indirizzo_resource($risorsa);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di visualizzare questo indirizzo.");
    }




    public function store(indirizzo_store_request $request, $contatto)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può creare un indirizzo per qualsiasi contatto
        if (Gate::allows('ruolo', 'amministratore') || ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$contatto)) {
            $data = $request->validated();

            $nazione = nazione_model::where('nazione', $data['nazione'])->firstOrFail();
            $comune_italiano = comune_italiano_model::where('comune', $data['comune_italiano'])->firstOrFail();
            $tipo_indirizzo = tipo_indirizzo_model::where('tipo', $data['tipo_indirizzo'])->firstOrFail();

            $indirizzo = new indirizzo_model();
            $indirizzo->id_contatto = $contatto;
            $indirizzo->id_nazione = $nazione->id_nazione;
            $indirizzo->id_comune_italiano = $comune_italiano->id_comune_italiano;
            $indirizzo->id_tipo_indirizzo = $tipo_indirizzo->id_tipo_indirizzo;
            $indirizzo->cap = $data['cap'];
            $indirizzo->indirizzo = $data['indirizzo'];
            $indirizzo->civico = $data['civico'];
            $indirizzo->save();

            return new indirizzo_resource($indirizzo);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di creare un indirizzo per questo contatto.");
    }




    public function update(indirizzo_update_request $request, $id_contatto, $id_indirizzo)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può aggiornare qualsiasi indirizzo
        if (Gate::allows('ruolo', 'amministratore') || ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto)) {
            $indirizzo_model = indirizzo_model::where('id_contatto', $id_contatto)
                ->where('id_indirizzo', $id_indirizzo)
                ->firstOrFail();

            // Verifico e aggiorno i campi se presenti nella richiesta
            if ($request->has('nazione')) {
                $nazione = nazione_model::where('nazione', $request->get('nazione'))->first();
                if ($nazione) {
                    $indirizzo_model->id_nazione = $nazione->id_nazione;

                    // Se la nazione è diversa da 82 (Italy), imposto id_comune_italiano e cap a null
                    if ($nazione->id_nazione != 82) {
                        $indirizzo_model->id_comune_italiano = null;
                        $indirizzo_model->cap = null;
                    }
                }
            }

            // Se la nazione è 82 (Italy) e il comune_italiano è presente nella richiesta
            if ($indirizzo_model->id_nazione == 82 && $request->has('comune_italiano')) {
                $comune_italiano = comune_italiano_model::where('comune', $request->get('comune_italiano'))->first();

                if ($comune_italiano) {
                    $indirizzo_model->id_comune_italiano = $comune_italiano->id_comune_italiano;

                    // Imposto il CAP solo se il comune_italiano è valido
                    $indirizzo_model->cap = $request->get('cap') ?? null;
                } else {
                    // Se non si trova il comune, imposto id_comune_italiano e cap a null
                    $indirizzo_model->id_comune_italiano = null;
                    $indirizzo_model->cap = null;
                }
            }

            if ($request->has('tipo_indirizzo')) {
                $tipo_indirizzo = tipo_indirizzo_model::where('tipo', $request->get('tipo_indirizzo'))->first();
                if ($tipo_indirizzo) {
                    $indirizzo_model->id_tipo_indirizzo = $tipo_indirizzo->id_tipo_indirizzo;
                }
            }

            if ($request->has('indirizzo')) {
                $indirizzo_model->indirizzo = $request->get('indirizzo');
            }

            if ($request->has('cap')) {
                $indirizzo_model->cap = $request->get('cap');
            }

            if ($request->has('civico')) {
                $indirizzo_model->civico = $request->get('civico');
            }

            if ($request->has('id_contatto')) {
                $new_contatto = $request->get('id_contatto');
                $contatto_exists = contatto_model::where('id_contatto', $new_contatto)->exists();
                if ($contatto_exists) {
                    $indirizzo_model->id_contatto = $new_contatto;
                }
            }

            $indirizzo_model->save();
            return new indirizzo_resource($indirizzo_model);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di aggiornare questo indirizzo.");
    }






    public function destroy($id_contatto, $id_indirizzo)
    {
        $utenteAutenticato = Auth::user();

        // Se l'utente è amministratore, può eliminare qualsiasi indirizzo
        if (Gate::allows('ruolo', 'amministratore') || ($utenteAutenticato && $utenteAutenticato->id_contatto === (int)$id_contatto)) {
            $indirizzo_model = indirizzo_model::where('id_contatto', $id_contatto)
                ->where('id_indirizzo', $id_indirizzo)
                ->firstOrFail();

            $indirizzo_model->delete();

            return response()->json(['message' => 'Indirizzo eliminato con successo'], 200);
        }

        abort(403, "ATTENZIONE: Non hai il permesso di eliminare questo indirizzo.");
    }
}
