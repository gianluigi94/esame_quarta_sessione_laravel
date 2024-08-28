<?php

namespace Database\Seeders;

use App\Models\film_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class film_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->truncate();
        film_model::create([
            'id_categoria' => 1,
            'titolo'=> 'prova',
            'descrizione'=> 'descrizione bella',
            'durata'=> 120,
            'regista'=> 'io',
            'attori'=> 'io, te',
            'anno'=> '1994',
            'id_locandina'=> 1,
            'id_video_film'=> 1,
            'id_trailer' => 1
        ]);
        film_model::create([
            'id_categoria' => 2,
            'titolo'=> 'prova due il ritorno',
            'descrizione'=> 'descrizione bella molto',
            'durata'=> 120,
            'regista'=> 'lui',
            'attori'=> 'io, te',
            'anno'=> '1994',
            'id_locandina'=> 2,
            'id_video_film'=> 2,
            'id_trailer' => 2
        ]);
    }
}
