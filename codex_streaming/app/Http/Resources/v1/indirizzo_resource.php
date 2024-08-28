<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class indirizzo_resource extends JsonResource
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
        'id_comune_italiano' => $this->id_comune_italiano,
        'id_indirizzo' => $this->id_indirizzo,
        'id_contatto' =>(int) $this->id_contatto,
        'id_nazione' => $this-> id_nazione,
        'tipo_indirizzo' =>$this->tipo_indirizzo->tipo,
        'cap' => $this->cap,
        'indirizzo' => $this->indirizzo,
        'civico' => $this->civico,
    ];
}



}
