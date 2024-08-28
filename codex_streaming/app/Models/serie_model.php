<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class serie_model extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'serie';
    protected $primaryKey = 'id_serie';

    protected $fillable = [
        'id_categoria',
        'titolo',
        'descrizione',
        'totale_stagioni',
        'totale_episodi',
        'regista',
        'attori',
        'anno_inizio',
        'anno_fine',
        'id_locandina',
        'id_trailer'
    ];

    public function stagioni()
    {
        return $this->hasMany(stagione_model::class, 'id_serie', 'id_serie');
    }

    public function episodi()
    {
        return $this->hasMany(episodio_model::class, 'id_serie', 'id_serie');
    }
}
