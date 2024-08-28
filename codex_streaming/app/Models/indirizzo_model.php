<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class indirizzo_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'indirizzi';

    protected $primaryKey = 'id_indirizzo';

    protected $fillable = [
        'id_contatto',
        'id_nazione',
        'id_comune_italiano',
        'id_tipo_indirizzo',
        'cap',
        'indirizzo',
        'civico',
    ];

    public function contatto()
    {
        return $this->belongsTo(contatto_model::class, 'id_contatto', 'id_contatto');
    }

    public function tipo_indirizzo()
    {
        return $this->belongsTo(tipo_indirizzo_model::class, 'id_tipo_indirizzo', 'id_tipo_indirizzo');
    }
    public function nazione()
    {
        return $this->belongsTo(nazione_model::class, 'id_nazione', 'id_nazione');
    }
    public function comune_italiano()
    {
        return $this->belongsTo(comune_italiano_model::class, 'id_comune_italiano', 'id_comune_italiano');
    }
}
