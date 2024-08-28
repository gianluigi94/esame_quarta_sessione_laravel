<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ruolo_resource extends JsonResource
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
            'id_ruolo' => $this->id_ruolo,
            'ruolo' => $this->ruolo,
            'abilita' => $this->abilita->map(function ($abilita) {
                return [
                    'nome' => $abilita->nome,
                    'sku' => $abilita->sku,
                ];
            })
        ];
    }

}
