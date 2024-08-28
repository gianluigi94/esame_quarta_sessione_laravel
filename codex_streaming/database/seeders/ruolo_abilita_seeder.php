<?php

namespace Database\Seeders;

use App\Models\ruolo_abilita_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ruolo_abilita_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ruolo_abilita_model::create([
            'id_abilita' => 1,
            'id_ruolo' => 1,
        ]);
        ruolo_abilita_model::create([
            'id_abilita' => 2,
            'id_ruolo' => 1,
        ]);
        ruolo_abilita_model::create([
            'id_abilita' => 3,
            'id_ruolo' => 1,
        ]);
        ruolo_abilita_model::create([
            'id_abilita' => 4,
            'id_ruolo' => 1,
        ]);
        ruolo_abilita_model::create([
            'id_abilita' => 1,
            'id_ruolo' => 2,
        ]);
        ruolo_abilita_model::create([
            'id_abilita' => 3,
            'id_ruolo' => 2,
        ]);
    }
}
