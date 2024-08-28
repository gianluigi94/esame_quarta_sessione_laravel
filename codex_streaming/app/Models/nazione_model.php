<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nazione_model extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'nazioni';
    protected $primaryKey = 'id_nazione';

    protected $fillable = [
        'id_nazione',
        'nazione',
        'continente',
        'iso',
        'iso3',
        'prefisso_tel'
    ];
}
