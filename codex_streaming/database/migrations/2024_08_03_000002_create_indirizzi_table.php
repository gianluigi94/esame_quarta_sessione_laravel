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
        Schema::create('indirizzi', function (Blueprint $table) {
            $table->id('id_indirizzo');
            $table->unsignedBigInteger('id_contatto')->nullable();
            $table->unsignedBigInteger('id_nazione');
            $table->unsignedBigInteger('id_comune_italiano')->nullable();
            $table->unsignedBigInteger('id_tipo_indirizzo');
            $table->string('cap', 10)->nullable();
            $table->string('indirizzo', 255);
            $table->string('civico', 10);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirizzi');
    }
};
