<?php

namespace Database\Seeders;


use App\Models\configurazione_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class configurazione_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            configurazione_model::create([
                'chiave' => 'max_login_errati',
                'valore' => 5,
            ]);
            configurazione_model::create([
                'chiave' => 'durata_sfida',
                'valore' => 30,
            ]);
            configurazione_model::create([
                'chiave' => 'durata_sessione',
                'valore' => 1800,
            ]);
            configurazione_model::create([
                'chiave' => 'storico_psw',
                'valore' => 3,
            ]);
            configurazione_model::create([
                'chiave' => 'cambio_tk',
                'valore' => 600,
            ]);
            configurazione_model::create([
                'chiave' => 'termina_tk',
                'valore' => 604800,
            ]);
            configurazione_model::create([
                'chiave' => 'termina_psw',
                'valore' => 15552000,
            ]);
            configurazione_model::create([
                'chiave' => 'blocco_psw',
                'valore' => 7200,
            ]);


    }
}
