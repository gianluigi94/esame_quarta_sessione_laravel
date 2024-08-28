<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class episodio_model extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'episodi';
    protected $primaryKey = 'id_episodio';

    protected $fillable = [
        'id_serie',
        'id_stagione',
        'numero_episodio',
        'numero_stagione',
        'titolo',
        'descrizione',
        'durata',
        'anno',
        'id_video_episodio'
    ];


    public function stagione()
    {
        return $this->belongsTo(stagione_model::class, 'id_stagione', 'id_stagione');
    }

    public function serie()
    {
        return $this->belongsTo(serie_model::class, 'id_serie', 'id_serie');
    }


}
