<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class password_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'password';
    protected $primaryKey = 'id_password';

    protected $fillable = [
        'id_password',
        'id_contatto',
        'password',
        'sale'
    ];

    public static function password_attuale($id_contatto)
    {
        $record = password_model::where('id_contatto', $id_contatto)->orderBy('id_password', 'desc')->firstOrFail();
        return $record;
    }
}
