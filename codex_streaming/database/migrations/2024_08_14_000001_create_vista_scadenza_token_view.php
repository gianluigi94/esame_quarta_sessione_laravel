<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW vista_scadenza_token AS
            SELECT
                sessioni.id_contatto,
                sessioni.token,
                autenticazioni.inizio_token,
                autenticazioni.inizio_cambio_tk
            FROM
                sessioni
            INNER JOIN
                autenticazioni
            ON
                sessioni.id_contatto = autenticazioni.id_contatto
        ");
    }


};
