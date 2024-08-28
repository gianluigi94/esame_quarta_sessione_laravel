<?php

namespace Database\Seeders;

use App\Models\serie_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class serie_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('serie')->truncate();
        serie_model::create([
        'id_categoria' => 3,
        'titolo' => 'titolo serie1',
        'descrizione' => 'descrizione super serie',
        'totale_stagioni' => 4,
        'totale_episodi' => 16,
        'regista' => 'super regista',
        'attori' => 'attore1, attore2',
        'anno_inizio' => 2000,
        'anno_fine' => null,
        'id_locandina' => 3,
        'id_trailer' => 3
        ]);
        serie_model::create([
        'id_categoria' => 4,
        'titolo' => 'titolo serie2',
        'descrizione' => 'descrizione super serie2',
        'totale_stagioni' => 4,
        'totale_episodi' => 16,
        'regista' => 'super regista',
        'attori' => 'attore1, attore2',
        'anno_inizio' => 2000,
        'anno_fine' => null,
        'id_locandina' => 4,
        'id_trailer' => 4
        ]);
        serie_model::create([
        'id_categoria' => 3,
        'titolo' => 'titolo serie3',
        'descrizione' => 'descrizione super serie2',
        'totale_stagioni' => 4,
        'totale_episodi' => 16,
        'regista' => 'super regista',
        'attori' => 'attore1, attore2',
        'anno_inizio' => 2000,
        'anno_fine' => null,
        'id_locandina' => 5,
        'id_trailer' => 5
        ]);
        serie_model::create([
        'id_categoria' => 4,
        'titolo' => 'titolo serie4',
        'descrizione' => 'descrizione super serie2',
        'totale_stagioni' => 4,
        'totale_episodi' => 16,
        'regista' => 'super regista',
        'attori' => 'attore1, attore2',
        'anno_inizio' => 2000,
        'anno_fine' => null,
        'id_locandina' => 6,
        'id_trailer' => 6
        ]);
    }
}
