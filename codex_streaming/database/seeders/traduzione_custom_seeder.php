<?php

namespace Database\Seeders;

use App\Models\traduzioni_custom_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class traduzione_custom_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        traduzioni_custom_model::create([
            'id_lingua' => 2,
            'id_traduzione' => 3,
            'riferimento' => 'h1',
            'contenuto' => 'Benvenuto nella pagina principale del nostro sito di streaming',
            'traduzione' => 'Step into a world of endless possibilities, where every click brings new adventures.',
        ]);

        traduzioni_custom_model::create([
            'id_lingua' => 3,
            'id_traduzione' => 4,
            'riferimento' => 'home_page',
            'contenuto' => 'Benvenuto nella pagina principale del nostro sito di streaming, dai un\'occhiata alle novità, buona visione!',
            'traduzione' => 'Plongez dans une aventure captivante avec notre catalogue exclusif, conçu pour éveiller vos sens et enrichir votre expérience.',
        ]);
    }
}
