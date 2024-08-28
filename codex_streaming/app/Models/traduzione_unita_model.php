<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traduzione_unita_model extends Model
{
    use HasFactory;

    protected $table = 'vista_traduzioni_unite';

    protected $fillable = [
        'id_traduzione_unita',
        'id_lingua',
        'riferimento',
        'traduzione'
    ];

    public function lingue()
{
    return $this->belongsTo(lingua_model::class, 'id_lingua', 'id_lingua');
}

}
