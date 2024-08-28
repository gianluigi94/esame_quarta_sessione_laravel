<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contatti', function (Blueprint $table) {
            $table->id('id_contatto');
            $table->string('nome', 45);
            $table->string('cognome', 45);
            $table->unsignedTinyInteger('sesso')->nullable();
            $table->string('codice_fiscale', 45)->nullable();
            $table->string('partita_iva', 45)->nullable();
            $table->string('cittadinanza', 45)->nullable();
            $table->string('citta_nascita', 45)->nullable();
            $table->string('provincia_nascita', 45)->nullable();
            $table->date('data_nascita')->nullable();
            $table->dateTime('blocco_password')->nullable();
            $table->unsignedBigInteger('id_stato_utente')->default(1);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti');
    }
};
