<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comune_italiano_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'comuni_italiani';
    protected $primaryKey = 'id_comune_italiano';

    protected $fillable = [
        'comune',
        'sigla_automobilistica',
        'codice_belfiore',
        'lat',
        'lon',
        'cap',
        'capoluogo',
        'multi_cap',
        'cap_inizio',
        'cap_fine',
    ];
}
