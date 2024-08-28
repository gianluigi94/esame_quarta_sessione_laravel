<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class comune_resource extends JsonResource
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
            'id_comune' => $this->id_comune_italiano,
            'comune' => $this->comune,
            'sigla_automobilistica' => $this->sigla_automobilistica,
            'codice_belfiore' => $this->codice_belfiore,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'capoluogo' => $this->capoluogo,
            'multi_cap' => $this->multi_cap,
            'cap_inizio' => $this->cap_inizio,
            'cap_fine' => $this->cap_fine
        ];
    }
}
