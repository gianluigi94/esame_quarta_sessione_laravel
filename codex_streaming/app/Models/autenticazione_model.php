<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class autenticazione_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'autenticazioni';
    protected $primaryKey = 'id_autenticazione';

    protected $fillable = [
        'id_autenticazione',
        'id_contatto',
        'user',
        'secret_jwt',
        'inizio_sfida',
        'obbligo_cambio',
        'inizio_token'
    ];



    public static function esistente_utente_valido_per_login($user)
    {
        $utente = DB::table('contatti')
            ->join('autenticazioni', 'contatti.id_contatto', '=', 'autenticazioni.id_contatto')
            ->where('autenticazioni.user', '=', $user)
            ->select('contatti.id_stato_utente', 'autenticazioni.id_contatto')
            ->first();

        if ($utente && $utente->id_stato_utente != 1) {
            abort(403, "ATTENZIONE: UTENTE BANNATO NON HAI PIU' I PERMESSI PER ACCEDERE" );
        }

        return ($utente && $utente->id_stato_utente == 1) ? true : false;
    }



}
