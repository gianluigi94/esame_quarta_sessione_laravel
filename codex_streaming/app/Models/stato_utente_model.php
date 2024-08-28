<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class stato_utente_model extends Model
{

    use HasFactory,SoftDeletes;

    protected $table = 'stati_utenti';
    protected $primaryKey = 'id_stato_utente';

    protected $fillable = [
        'id_stato_utente',
        'id_contatto_stato',
        'stato'
        ];
        public function contatti_utenti()
        {
            return $this->belongsTo(contatto_model::class, 'id_contatto_stato', 'id_contatto');
        }
}
