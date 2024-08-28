<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoria_model extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categorie';
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'categoria'
    ];
}
