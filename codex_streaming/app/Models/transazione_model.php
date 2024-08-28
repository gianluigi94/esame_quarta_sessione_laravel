<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transazione_model extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transazioni';

    protected $primaryKey = 'id_transazione';

    protected $fillable = [
        'id_credito',
        'importo',
        'successo'
    ];

    public function credito()
    {
        return $this->belongsTo(credito_model::class, 'id_credito', 'id_credito');
    }
}
