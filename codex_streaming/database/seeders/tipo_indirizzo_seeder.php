<?php

namespace Database\Seeders;

use App\Models\tipo_indirizzo_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tipo_indirizzo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tipo_indirizzo_model::create([
            'tipo' => 'residenziale'
        ]);
        tipo_indirizzo_model::create([
            'tipo' => 'sede legale'
        ]);
        tipo_indirizzo_model::create([
            'tipo' => 'aziendale'
        ]);
        tipo_indirizzo_model::create([
            'tipo' => 'residenza_estiva'
        ]);
        tipo_indirizzo_model::create([
            'tipo' => 'altro'
        ]);
    }
}
