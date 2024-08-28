<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class contatto_resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->get_campi();
    }

    protected function get_campi()
    {
        return [
            'id_contatto' => $this->id_contatto,
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'sesso' => $this->sesso,
            // 'codice_fiscale' => $this->codice_fiscale,
            // 'partita_iva' => $this->partita_iva,
            // 'cittadinanza' => $this->cittadinanza,
            // 'citta_nascita' => $this->citta_nascita,
            // 'provincia_nascita' => $this->provincia_nascita,
            // 'data_nascita' => $this->data_nascita,
            'id_stato_utente' => $this->id_stato_utente
        ];
    }
}
