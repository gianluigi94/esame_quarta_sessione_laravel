<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class trailer_model extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'trailers';
    protected $primaryKey = 'id_trailer';

    protected $fillable = [
        'id_file',
        'nome',
        'percorso'
    ];
    public function file()
    {
        return $this->belongsTo(file_model::class, 'id_file', 'id_file');
    }
}
