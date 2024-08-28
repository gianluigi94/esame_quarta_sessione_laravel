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
        Schema::create('stati_utenti', function (Blueprint $table) {
            $table->id('id_stato_utente');
            $table->unsignedBigInteger('id_contatto_stato');
            $table->string('stato', 45);
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stati_utenti');
    }
};
