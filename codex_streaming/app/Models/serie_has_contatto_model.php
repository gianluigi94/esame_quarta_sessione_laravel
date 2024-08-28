<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class serie_has_contatto_model extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'serie_has_contatti';

    protected $fillable = [
        'id_serie',
        'id_contatto',
    ];
}
