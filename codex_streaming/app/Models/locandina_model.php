<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class locandina_model extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'locandine';
    protected $primaryKey = 'id_locandina';

    protected $fillable = [
        'nome',
        'id_file',
        'percorso'
    ];
    public function file()
    {
        return $this->belongsTo(file_model::class, 'id_file', 'id_file');
    }
}
