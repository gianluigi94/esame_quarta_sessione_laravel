<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class film_resource extends JsonResource
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
            'id_film' => $this -> id_film,
            'id_categoria' => $this->id_categoria,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            // 'durata' => $this->durata,
            // 'regista' => $this->regista,
            // 'attori' => $this->attori,
            // 'anno' => $this->anno,
            // 'id_locandina' => $this->id_locandina,
            // 'id_video_film' => $this->id_video_film,
            // 'id_trailer' => $this->id_trailer
        ];
    }
}
