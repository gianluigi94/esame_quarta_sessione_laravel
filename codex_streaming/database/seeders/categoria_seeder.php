<?php

namespace Database\Seeders;

use App\Models\categoria_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoria_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorie')->truncate();

        $categorie = [
            ['id_categoria' => 1, 'categoria' => 'Azione'],
            ['id_categoria' => 2, 'categoria' => 'Commedia'],
            ['id_categoria' => 3, 'categoria' => 'Dramma'],
            ['id_categoria' => 4, 'categoria' => 'Fantascienza'],
            ['id_categoria' => 5, 'categoria' => 'Horror'],
            ['id_categoria' => 6, 'categoria' => 'Romantico'],
            ['id_categoria' => 7, 'categoria' => 'Documentario'],
            ['id_categoria' => 8, 'categoria' => 'Avventura'],
            ['id_categoria' => 9, 'categoria' => 'Animazione'],
            ['id_categoria' => 10, 'categoria' => 'Thriller'],
        ];

        foreach ($categorie as $categoria) {
            categoria_model::create($categoria);
        }
    }

}
