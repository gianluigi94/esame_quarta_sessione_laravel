<?php

namespace Database\Seeders;

use App\Http\Middleware\autenticazione;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        $this->call(
            [
                contatto_seeder::class,
                film_seeder::class,
                video_film_seeder::class,
                video_episodio_seeder::class,
                trailer_seeder::class,
                categoria_seeder::class,
                locandina_seeder::class,
                serie_seeder::class,
                stagione_seeder::class,
                episodio_seeder::class,
                recapito_seeder::class,
                tipo_recapito_seeder::class,
                nazione_seeder::class,
                stato_utente_seeder::class,
                password_seeder::class,
                autenticazione_seeder::class,
                configurazione_seeder::class,
                sessione_seeder::class,
                ruolo_seeder::class,
                contatto_ruolo_seeder::class,
                abilita_seeder::class,
                ruolo_abilita_seeder::class,
                file_seeder::class,
                comune_italiano_seeder::class,
                indirizzo_seeder::class,
                tipo_indirizzo_seeder::class,
                credito_seeder::class,
                transazione_seeder::class,
                traduzione_seeder::class,
                lingua_seeder::class,
                traduzione_custom_seeder::class,
            ]
        );
    }
}
