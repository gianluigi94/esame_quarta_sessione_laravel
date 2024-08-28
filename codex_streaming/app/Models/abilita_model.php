<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class abilita_model extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'abilita';
    protected $primaryKey = 'id_abilita';

    protected $fillable = [
        'id_abilita',
        'id_ruolo'
    ];

    public function ruoli()
    {
        return $this->belongsToMany(ruolo_model::class, 'ruoli_abilita', 'id_abilita', 'id_ruolo');
    }
}
