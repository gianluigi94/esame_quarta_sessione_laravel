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
        Schema::create('traduzioni_custom', function (Blueprint $table) {
            $table->id('id_traduzione_custom');
            $table->unsignedBigInteger('id_lingua');
            $table->unsignedBigInteger('id_traduzione')->nullable();
            $table->string('riferimento', 255);
            $table->text('contenuto');
            $table->text('traduzione');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traduzioni_custom');
    }
};
