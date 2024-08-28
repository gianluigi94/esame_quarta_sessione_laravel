<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class credito_resource extends JsonResource
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
            'id_credito' => $this->id_credito,
            'id_contatto' => $this->id_contatto,
            'credito' => $this->credito,
        ];
    }
}
