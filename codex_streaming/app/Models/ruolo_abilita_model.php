<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ruolo_abilita_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ruoli_abilita';

    protected $fillable = [
        'id_ruolo',
        'id_abilita'
    ];
}
