<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\transazione_model;

class transazione_seeder extends Seeder
{
    public function run()
    {
        transazione_model::create([
            'id_credito' => 1,
            'importo' => '+100',
            'successo' => true,
        ]);

        transazione_model::create([
            'id_credito' => 2,
            'importo' => '+100',
            'successo' => true,
        ]);
        transazione_model::create([
            'id_credito' => 2,
            'importo' => '+50',
            'successo' => false,
        ]);
        transazione_model::create([
            'id_credito' => 2,
            'importo' => '+50',
            'successo' => true,
        ]);

        transazione_model::create([
            'id_credito' => 3,
            'importo' => '+250',
            'successo' => true,
        ]);
        transazione_model::create([
            'id_credito' => 3,
            'importo' => '-49.25',
            'successo' => true,
        ]);
    }
}
