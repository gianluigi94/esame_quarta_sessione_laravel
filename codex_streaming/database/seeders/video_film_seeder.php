<?php

namespace Database\Seeders;

use App\Models\video_film_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class video_film_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('video_films')->truncate();
        video_film_model::create([
            'id_video_film' => 1,
            'id_file' => 23,
            'nome' => 'file_film1'
        ]);
        video_film_model::create([
            'id_video_film' => 2,
            'id_file' => 24,
            'nome' => 'file_film2'

        ]);
    }
}
