<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contatto_film_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'contatto_has_films';

    protected $fillable = [
        'id_contatto',
        'id_film',
    ];
}
