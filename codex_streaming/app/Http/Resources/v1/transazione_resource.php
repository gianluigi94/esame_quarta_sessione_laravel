<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class transazione_resource extends JsonResource
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
            'id_transazione' => $this->id_transazione,
            'id_contatto' => $this->credito->id_contatto,
            'successo' => $this->successo,
            'importo' => $this->importo,
            'created_at' => $this->created_at
        ];
    }
}
