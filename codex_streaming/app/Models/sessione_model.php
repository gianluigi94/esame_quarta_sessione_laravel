<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class sessione_model extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sessioni';
    protected $primaryKey = 'id_sessione';

    protected $fillable = [
        'id_contatto',
        'token',
        'inizio_sessione',
        'inizio_token',
    ];

    public static function elimina_sessione($id_contatto)
    {
        DB::table('sessioni')->where('id_contatto', $id_contatto)->delete();
    }


    public static function aggiorna_sessione($id_contatto, $tk)
{
    $now = date('Y-m-d H:i:s', time());

    $where = ['id_contatto' => $id_contatto, 'token' => $tk];
    $arr = [
        'inizio_sessione' => $now,
        'updated_at' => $now

    ];

    DB::table('sessioni')->updateOrInsert($where, array_merge($arr, ['created_at' => $now]));

}




    public static function dati_sessione($token)
    {
        if (sessione_model::esiste_sessione($token)) {

            return sessione_model::where('token', $token)->get()->first();
        } else {
            return null;
        }
    }


    public static function esiste_sessione($token)
    {
        return DB::table("sessioni")->where('token', $token)->exists();
    }
}
