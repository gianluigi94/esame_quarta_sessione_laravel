<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class recapito_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'recapiti';
    protected $primaryKey = 'id_recapito';

    protected $fillable = [
        'id_contatto',
        'id_tipo_recapito',
        'recapito'
    ];

    public function contatto()
    {
        return $this->belongsTo(contatto_model::class, 'id_contatto', 'id_contatto');
    }

    public function tipo_recapito()
    {
        return $this->belongsTo(tipo_recapito_model::class, 'id_tipo_recapito', 'id_tipo_recapito');
    }



}
