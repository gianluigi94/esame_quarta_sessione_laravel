<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_recapito_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'tipi_recapiti';
    protected $primaryKey = 'id_tipo_recapito';

    protected $fillable = [
        'tipo'
    ];
}
