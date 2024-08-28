<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class credito_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'crediti';

    protected $primaryKey = 'id_credito';

    protected $fillable = [
        'id_contatto',
        'credito',
    ];
}
