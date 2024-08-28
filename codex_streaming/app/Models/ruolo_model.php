<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ruolo_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ruoli';
    protected $primaryKey = 'id_ruolo';

    protected $fillable = [
        'ruolo',
        'id_ruolo'
    ];

    public function contatti()
    {
        return $this->belongsToMany(contatto_model::class, 'contatti_ruoli', 'id_ruolo', 'id_contatto');
    }

    public function abilita()
    {
        return $this->belongsToMany(abilita_model::class, 'ruoli_abilita', 'id_ruolo', 'id_abilita');
    }
}
