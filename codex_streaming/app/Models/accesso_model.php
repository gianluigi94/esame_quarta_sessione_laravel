<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class accesso_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'accessi';
    protected $primaryKey = 'id_accesso';

    protected $fillable = [
        'id_accesso',
        'id_contatto',
        'indirizzo_ip',
        'successo',
        'inizio_token'
    ];

    public static function aggiungi_tentativo_fallito($id_contatto){
        return accesso_model::nuovo_record($id_contatto, 0);
    }

    protected static function nuovo_record($id_contatto, $successo)
    {
        $ip_address = request()->ip() ?? $_SERVER['REMOTE_ADDR'];

        $tmp = accesso_model::create([
            'id_contatto' => $id_contatto,
            'successo' => $successo,
            'indirizzo_ip' => $ip_address
        ]);

        return $tmp;
    }

    public static function elimina_tentativi($id_contatto)
    {
        $indirizzo_ip = accesso_model::where('id_contatto', $id_contatto)
                                     ->where('successo', 0)
                                     ->pluck('indirizzo_ip')
                                     ->first();

        if (!$indirizzo_ip) {
            return 0;
        }

        $eliminati_id_contatto = accesso_model::where('id_contatto', $id_contatto)
                                              ->where('successo', 0)
                                              ->delete();

        $eliminati_ip_null = accesso_model::where('indirizzo_ip', $indirizzo_ip)
                                          ->where('successo', 0)
                                          ->whereNull('id_contatto')
                                          ->delete();

        return $eliminati_id_contatto + $eliminati_ip_null;
    }



public static function conta_tentativi($id_contatto)
{
    $indirizzo_ip = accesso_model::where('id_contatto', $id_contatto)
                                 ->where('successo', 0)
                                 ->pluck('indirizzo_ip')
                                 ->first();

    if (!$indirizzo_ip) {
        return 0;
    }

    $tentativi_id_contatto = accesso_model::where('id_contatto', $id_contatto)
                                          ->where('successo', 0)
                                          ->count();

    $tentativi_ip_null = accesso_model::where('indirizzo_ip', $indirizzo_ip)
                                      ->where('successo', 0)
                                      ->whereNull('id_contatto')
                                      ->count();

    $tentativi_totali = $tentativi_id_contatto + $tentativi_ip_null;

    return $tentativi_totali;
}

}
