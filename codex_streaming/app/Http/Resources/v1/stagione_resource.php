<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class stagione_resource extends JsonResource
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
            'id_stagione' => $this->id_stagione,
            'id_serie' => $this->id_serie,
            'titolo' => $this->titolo,
            'numero_stagione' => $this->numero_stagione,
            'totale_episodi' => $this->totale_episodi,
            'id_locandina' => $this->id_locandina
        ];
    }
}
