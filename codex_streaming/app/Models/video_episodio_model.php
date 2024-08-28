<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class video_episodio_model extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'video_episodi';
    protected $primaryKey = 'id_video_episodio';

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
