<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class nazione_resource extends JsonResource
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
            'id_nazione' => $this->id_nazione,
            'nazione' => $this->nazione,
            'continente' => $this->continente,
            'iso' => $this->iso,
            'iso3' => $this->iso3,
            'prefisso_tel' => $this->prefisso_tel
        ];
    }
}
