<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class traduzioni_custom_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'traduzioni_custom';

    protected $primaryKey = 'id_traduzione_custom';

    protected $fillable = [
        'id_lingua',
        'id_traduzione_custom',
        'riferimento',
        'contenuto',
        'traduzione',
    ];
    public function lingue()
    {
        return $this->belongsTo(lingua_model::class, 'id_lingua', 'id_lingua');
    }
}
