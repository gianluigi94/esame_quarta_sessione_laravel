<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class stato_utente_resource extends JsonResource
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
            'id_stato_utente' => $this->id_stato_utente,
            'id_contatto_stato' => $this->id_contatto_stato,
            'stato'=> $this->stato
        ];
    }
}
