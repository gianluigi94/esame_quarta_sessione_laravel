<?php

namespace Database\Seeders;

use App\Models\indirizzo_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class indirizzo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        indirizzo_model::create([
            'id_contatto'        => 1,
            'id_nazione'         => 82,
            'id_comune_italiano' => 2644,
            'id_tipo_indirizzo'  => 1,
            'cap'                => '39040',
            'indirizzo'          => 'Via Roma',
            'civico'             => '12',
        ]);

        indirizzo_model::create([
            'id_contatto'        => 1,
            'id_nazione'         => 82,
            'id_comune_italiano' => 2645,
            'id_tipo_indirizzo'  => 2,
            'cap'                => '10121',
            'indirizzo'          => 'Corso Torino',
            'civico'             => '34',
        ]);
        indirizzo_model::create([
            'id_contatto'        => 2,
            'id_nazione'         => 82,
            'id_comune_italiano' => 2645,
            'id_tipo_indirizzo'  => 2,
            'cap'                => '10121',
            'indirizzo'          => 'Corso Torino',
            'civico'             => '34',
        ]);

        indirizzo_model::create([
            'id_contatto'        => 3,
            'id_nazione'         => 82,
            'id_comune_italiano' => null,
            'id_tipo_indirizzo'  => 1,
            'cap'                => null,
            'indirizzo'          => '5th Avenue',
            'civico'             => '21',
        ]);
        indirizzo_model::create([
            'id_contatto'        => 4,
            'id_nazione'         => 82,
            'id_comune_italiano' => null,
            'id_tipo_indirizzo'  => 1,
            'cap'                => null,
            'indirizzo'          => '5th Avenue',
            'civico'             => '21',
        ]);
    }
}
