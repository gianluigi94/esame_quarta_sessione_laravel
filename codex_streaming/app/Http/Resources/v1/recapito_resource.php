<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class recapito_resource extends JsonResource
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
            'id_recapito' => $this->id_recapito,
            'id_contatto' => $this->id_contatto,
            'tipo_recapito' => $this->tipo_recapito ? $this->tipo_recapito->tipo : null,
            'recapito' => $this->recapito
        ];
    }


}
