<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class file_resource extends JsonResource
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
    $tipo = null;

    if ($this->video_film) {
        $tipo = 'video_film';
    } elseif ($this->locandina) {
        $tipo = 'locandina';
    } elseif ($this->video_episodio) {
        $tipo = 'video_episodio';
    } elseif ($this->trailer) {
        $tipo = 'trailer';
    } else {
        $tipo = 'sconosciuto';
    }

    return [
        'id_file' => $this->id_file,
        'nome' => $this->nome,
        'tipo' => $tipo,
        'percorso' => $this->percorso,
        'dimensione' => $this->dimensione,
        'created_at' => $this->created_at
    ];
}


}
