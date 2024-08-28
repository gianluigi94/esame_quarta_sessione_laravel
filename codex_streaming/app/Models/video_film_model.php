<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class video_film_model extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'video_films';
    protected $primaryKey = 'id_video_film';

    protected $fillable = [
        'nome',
        'id_file',
        'percorso'

    ];
    public function file()
    {
        return $this->belongsTo(file_model::class, 'id_file', 'id_file');
    }
}
