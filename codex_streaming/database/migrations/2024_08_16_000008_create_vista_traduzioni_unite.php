<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //creo una vista per visualizzare le traduzioni
        DB::statement("
            CREATE VIEW vista_traduzioni_unite AS
            SELECT
                ROW_NUMBER() OVER (ORDER BY traduzioni.id_lingua, traduzioni.riferimento) AS id_traduzione_unita,
                traduzioni.id_lingua,
                traduzioni.riferimento,
                COALESCE(traduzioni_custom.traduzione, traduzioni.traduzione) AS traduzione
            FROM
                traduzioni
            LEFT JOIN
                traduzioni_custom
            ON
                traduzioni.id_lingua = traduzioni_custom.id_lingua
                AND traduzioni.riferimento = traduzioni_custom.riferimento;
        ");
    }

};
