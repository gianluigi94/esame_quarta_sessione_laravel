<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class serie_resource extends JsonResource
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
            'id_serie' => $this->id_serie,
            'id_categoria' => $this->id_categoria,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'totale_stagioni' => $this->totale_stagioni,
            'totale_episodi' => $this->totale_episodi,
            'regista' => $this->regista,
            'attori' => $this->attori,
            // 'anno_inizio' => $this->anno_inizio,
            // 'anno_fine' => $this->anno_fine,
            // 'id_locandina' => $this->id_locandina,
            // 'id_trailer' => $this->id_trailer
        ];
    }
}
