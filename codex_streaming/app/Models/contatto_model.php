<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class contatto_model extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'contatti';
    protected $primaryKey = 'id_contatto';

    protected $fillable = [
        'nome',
        'cognome',
        'sesso',
        'codice_fiscale',
        'partita_iva',
        'cittadinanza',
        'citta_nascita',
        'provincia_nascita',
        'data_nascita',
        'id_stato_utente',
        'blocco_password'
    ];

    public function ruoli()
    {
        return $this->belongsToMany(ruolo_model::class, 'contatti_ruoli', 'id_contatto', 'id_ruolo');
    }
    public function stati_utenti()
    {
        return $this->belongsTo(stato_utente_model::class, 'id_contatto', 'id_contatto_stato');
    }

    public function recapiti()
    {
        return $this->hasMany(recapito_model::class, 'id_contatto', 'id_contatto');
    }

    // Relazione con Password
    public function password()
    {
        return $this->hasOne(password_model::class, 'id_contatto', 'id_contatto');
    }



}
