<?php

namespace Database\Seeders;

use App\Models\stato_utente_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class stato_utente_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        stato_utente_model::create([
            'id_stato_utente' => 1,
            'id_contatto_stato' => 1,
            'stato' => 'attivo',
        ]);
        stato_utente_model::create([
            'id_stato_utente' => 2,
            'id_contatto_stato' => 0,
            'stato' => 'bannato',
        ]);

    }
}
