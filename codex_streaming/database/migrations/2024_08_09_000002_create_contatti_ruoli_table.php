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
        Schema::create('contatti_ruoli', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_contatto');
            $table->unsignedBigInteger('id_ruolo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti_ruoli');
    }
};
