<?php

namespace Database\Seeders;

use App\Models\traduzione_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class traduzione_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        traduzione_model::create([
            'id_lingua' => 2,
            'riferimento' => 'h1',
            'contenuto' => 'Pagina principale del nostro sito di streaming',
            'traduzione' => 'Main page of our streaming website',
        ]);

        traduzione_model::create([
            'id_lingua' => 2,
            'riferimento' => 'menu',
            'contenuto' => 'Chi siamo, Guarda le serie, Ultime uscite, Abbonamenti, Servizi',
            'traduzione' => 'About Us, Watch Series, Latest Releases, Subscriptions, Services',
        ]);

        traduzione_model::create([
            'id_lingua' => 2,
            'riferimento' => 'home_page',
            'contenuto' => 'Pagina principale del nostro sito di streaming, dai un\'occhiata alle novità, buona visione!',
            'traduzione' => 'Main page of our streaming website, take a look at the latest news, enjoy watching!',
        ]);


        traduzione_model::create([
            'id_lingua' => 3,
            'riferimento' => 'h1',
            'contenuto' => 'Pagina principale del nostro sito di streaming',
            'traduzione' => 'Page principale de notre site de streaming',
        ]);

        traduzione_model::create([
            'id_lingua' => 3,
            'riferimento' => 'menu',
            'contenuto' => 'Chi siamo, Guarda le serie, Ultime uscite, Abbonamenti, Servizi',
            'traduzione' => 'À propos de nous, Regarder les séries, Dernières sorties, Abonnements, Services',
        ]);

        traduzione_model::create([
            'id_lingua' => 3,
            'riferimento' => 'home_page',
            'contenuto' => 'Pagina principale del nostro sito di streaming, dai un\'occhiata alle novità, buona visione!',
            'traduzione' => 'Page principale de notre site de streaming, jetez un coup d\'œil aux dernières nouveautés, bon visionnage !',
        ]);
    }

}
