<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class film_model extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'films';
    protected $primaryKey = 'id_film';

    protected $fillable = [
        'id_categoria',
        'titolo',
        'descrizione',
        'durata',
        'regista',
        'attori',
        'anno',
        'id_locandina',
        'id_video_episodio',
        'id_trailer'
    ];


}
