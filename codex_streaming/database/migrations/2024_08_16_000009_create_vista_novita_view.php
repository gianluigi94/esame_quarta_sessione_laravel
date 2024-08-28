<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateVistaNovitaView extends Migration
{
    /**
     * Esegui la migrazione.
     *
     * @return void
     */
    public function up()
    {
        // Controlla il driver del database
        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'mysql') {
            // creo una della vista per MySQL
            DB::statement("
                CREATE VIEW vista_novita AS
                SELECT id_film AS id, titolo, 'film' AS tipo, created_at
                FROM films
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)

                UNION

                SELECT id_serie AS id, titolo, 'serie' AS tipo, created_at
                FROM serie
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)

                UNION

                SELECT id_stagione AS id, CONCAT('Stagione ', numero_stagione, ' di ', id_serie) AS titolo, 'stagione' AS tipo, created_at
                FROM stagioni
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
            ");
        } elseif ($driver === 'sqlite') {
            // Creazione della vista per SQLite ( mi serve per i test, altrimenti mi da errotre)
            DB::statement("
                CREATE VIEW vista_novita AS
                SELECT id_film AS id, titolo, 'film' AS tipo, created_at
                FROM films
                WHERE created_at >= datetime('now', '-7 days')

                UNION

                SELECT id_serie AS id, titolo, 'serie' AS tipo, created_at
                FROM serie
                WHERE created_at >= datetime('now', '-7 days')

                UNION

                SELECT id_stagione AS id, 'Stagione ' || numero_stagione || ' di ' || id_serie AS titolo, 'stagione' AS tipo, created_at
                FROM stagioni
                WHERE created_at >= datetime('now', '-7 days')
            ");
        }
    }

}
