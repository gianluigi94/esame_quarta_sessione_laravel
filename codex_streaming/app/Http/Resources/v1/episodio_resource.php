<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class episodio_resource extends JsonResource
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
            'id_episodio' => $this->id_episodio,
            'id_serie' => $this->id_serie,
            'numero_episodio' => $this->numero_episodio,
            'numero_stagione' => $this->numero_stagione,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'durata' => $this->durata,
            'anno' => $this->anno,
            'id_video_episodio' => $this->id_video_episodio
        ];
    }
}
