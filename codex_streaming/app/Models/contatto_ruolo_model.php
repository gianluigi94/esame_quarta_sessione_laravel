<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contatto_ruolo_model extends Model
{
    use HasFactory;

    protected $table = 'contatti_ruoli';

    protected $fillable = [
        'id_contatto',
        'id_ruolo'
    ];
}
