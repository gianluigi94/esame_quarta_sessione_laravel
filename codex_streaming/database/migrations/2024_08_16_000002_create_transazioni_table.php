<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transazioni', function (Blueprint $table) {
            $table->id('id_transazione');
            $table->unsignedBigInteger('id_credito');
            $table->string('importo');
            $table->tinyInteger('successo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transazioni');
    }
};
