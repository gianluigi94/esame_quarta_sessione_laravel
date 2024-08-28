<?php

namespace Database\Seeders;

use App\Models\trailer_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trailer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trailers')->truncate();
        trailer_model::create([
            'id_trailer' => 1,
            'id_file' => 89,
            'nome' => 'file_trailer_film1'
        ]);
        trailer_model::create([
            'id_trailer' => 2,
            'id_file' => 90,
            'nome' => 'file_trailer_film2'
        ]);
        trailer_model::create([
            'id_trailer' => 3,
            'id_file' => 91,
            'nome' => 'file_trailer_serie1'
        ]);
        trailer_model::create([
            'id_trailer' => 4,
            'id_file' => 92,
            'nome' => 'file_trailer_serie2'
        ]);
        trailer_model::create([
            'id_trailer' => 5,
            'id_file' => 93,
            'nome' => 'file_trailer_serie3'
        ]);
        trailer_model::create([
            'id_trailer' => 6,
            'id_file' => 94,
            'nome' => 'file_trailer_serie4'
        ]);
    }
}
