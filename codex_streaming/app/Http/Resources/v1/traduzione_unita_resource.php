<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class traduzione_unita_resource extends JsonResource
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
            'id_traduzione_unita' => $this->id_traduzione_unita,
            'lingua' => $this ->lingue->lingua,
            'riferimento' => $this->riferimento,
            'traduzione' => $this->traduzione,
        ];
    }
}
