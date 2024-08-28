<?php

namespace Database\Seeders;

use App\Models\contatto_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class contatto_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contatti')->truncate();

        contatto_model::create([

            'nome' => 'gian',
            'cognome' => 'prova',
            'sesso' => 0,
            'codice_fiscale' => 'provacodice',
            'partita_iva' => '12345678901',
            'cittadinanza' => 'italiana',
            'citta_nascita' => 'Roma',
            'provincia_nascita' => 'RM',
            'data_nascita' => '1990-01-01',
            'id_stato_utente' => 1
        ]);

        contatto_model::create([

            'nome' => 'anna',
            'cognome' => 'rossi',
            'sesso' => 1,
            'codice_fiscale' => 'rossianna',
            'partita_iva' => '09876543210',
            'cittadinanza' => 'italiana',
            'citta_nascita' => 'Milano',
            'provincia_nascita' => 'MI',
            'data_nascita' => '1992-02-02',
            'id_stato_utente' => 1

        ]);

        contatto_model::create([

            'nome' => 'francesco',
            'cognome' => 'rossi',
            'sesso' => 1,
            'codice_fiscale' => 'prato',
            'partita_iva' => '09876543210',
            'cittadinanza' => 'italiana',
            'citta_nascita' => 'Milano',
            'provincia_nascita' => 'MI',
            'data_nascita' => '1992-02-02',
            'id_stato_utente' => 1

        ]);

        contatto_model::create([

            'nome' => 'roberta',
            'cognome' => 'verdi',
            'sesso' => 1,
            'id_stato_utente' => 2
        ]);
    }
}
