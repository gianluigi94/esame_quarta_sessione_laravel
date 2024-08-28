<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lingua_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'lingue';

    protected $primaryKey = 'id_lingua';

    protected $fillable = [
        'codice',
        'lingua'
    ];
}
