<?php

namespace Database\Seeders;

use App\Models\recapito_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class recapito_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        recapito_model::create([
            'id_contatto' => 1,
            'id_tipo_recapito' => 1,
            'recapito' => '12344848484'
        ]);
        recapito_model::create([
            'id_contatto' => 1,
            'id_tipo_recapito' => 3,
            'recapito' => 'prova@gmail.com'
        ]);
        recapito_model::create([
            'id_contatto' => 2,
            'id_tipo_recapito' => 1,
            'recapito' => '12344848484'
        ]);
        recapito_model::create([
            'id_contatto' => 2,
            'id_tipo_recapito' => 3,
            'recapito' => 'prova@gmail.com'
        ]);
        recapito_model::create([
            'id_contatto' => 3,
            'id_tipo_recapito' => 3,
            'recapito' => 'prova@gmail.com'
        ]);
        recapito_model::create([
            'id_contatto' => 4,
            'id_tipo_recapito' => 3,
            'recapito' => 'prova@gmail.com'
        ]);

    }
}
