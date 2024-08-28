<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\credito_model;

class credito_seeder extends Seeder
{
    public function run()
    {
        credito_model::create([
            'id_contatto' => 1,
            'credito' => 100.00,
        ]);

        credito_model::create([
            'id_contatto' => 2,
            'credito' => 150.50,
        ]);

        credito_model::create([
            'id_contatto' => 3,
            'credito' => 200.75,
        ]);
        credito_model::create([
            'id_contatto' => 4,
            'credito' => 200.75,
        ]);
    }
}
