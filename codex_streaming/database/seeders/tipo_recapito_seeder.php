<?php

namespace Database\Seeders;

use App\Models\tipo_recapito_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tipo_recapito_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tipo_recapito_model::create([
            'id_tipo_recapito' => 1,
            'tipo' => 'telefono'
        ]);
        tipo_recapito_model::create([
            'id_tipo_recapito' => 2,
            'tipo' => 'fax'
        ]);
        tipo_recapito_model::create([
            'id_tipo_recapito' => 3,
            'tipo' => 'email'
        ]);
    }
}
