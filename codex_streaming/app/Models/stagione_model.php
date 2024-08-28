<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class stagione_model extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stagioni';
    protected $primaryKey = 'id_stagione';

    protected $fillable = [
        'id_stagione',
        'id_serie',
        'titolo',
        'numero_stagione',
        'totale_episodi',
        'id_locandina'
    ];

    public function serie()
    {
        return $this->belongsTo(serie_model::class, 'id_serie', 'id_serie');
    }

    public function episodi()
    {
        return $this->hasMany(episodio_model::class, 'id_stagione', 'id_stagione');
    }

}
