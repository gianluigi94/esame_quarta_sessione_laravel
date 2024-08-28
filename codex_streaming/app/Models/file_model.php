<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class file_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'file';
    protected $primaryKey = 'id_file';

    protected $fillable = [
        'nome',
        'percorso',
        'dimensione'
    ];
    public function video_film()
{
    return $this->hasOne(video_film_model::class, 'id_file', 'id_file');
}

public function trailer()
{
    return $this->hasOne(trailer_model::class, 'id_file', 'id_file');
}

public function video_episodio()
{
    return $this->hasOne(video_episodio_model::class, 'id_file', 'id_file');
}

public function locandina()
{
    return $this->hasOne(locandina_model::class, 'id_file', 'id_file');
}




}
