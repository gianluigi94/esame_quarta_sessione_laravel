<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW vista_scadenza_password AS
            SELECT
                accessi.id_contatto,
                accessi.indirizzo_ip,
                accessi.successo,
                accessi.deleted_at,
                contatti.blocco_password
            FROM
                accessi
            LEFT JOIN
                contatti
            ON
                accessi.id_contatto = contatti.id_contatto
        ");
    }


};
