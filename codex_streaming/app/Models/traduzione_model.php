<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class traduzione_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'traduzioni';

    protected $primaryKey = 'id_traduzione';

    protected $fillable = [
        'id_lingua',
        'riferimento',
        'contenuto',
        'traduzione',
    ];
    public function lingue()
{
    return $this->belongsTo(lingua_model::class, 'id_lingua', 'id_lingua');
}

}
