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
        Schema::create('stagioni', function (Blueprint $table) {
            $table->id('id_stagione');
            $table->unsignedBigInteger('id_serie');
            $table->string('titolo', 255);
            $table->unsignedBigInteger('numero_stagione')->nullable();
            $table->smallInteger('totale_episodi')->unsigned();
            $table->unsignedBigInteger('id_locandina');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagioni');
    }
};
