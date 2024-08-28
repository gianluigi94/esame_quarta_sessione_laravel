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
        Schema::create('serie', function (Blueprint $table) {
            $table->id('id_serie');
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->tinyInteger('totale_stagioni')->unsigned();
            $table->tinyInteger('totale_episodi')->unsigned();
            $table->string('regista', 45)->nullable();
            $table->string('attori', 255)->nullable();
            $table->smallInteger('anno_inizio')->unsigned();
            $table->smallInteger('anno_fine')->unsigned()->nullable();
            $table->unsignedBigInteger('id_locandina')->nullable();
            $table->unsignedBigInteger('id_trailer')->nullable();
            $table->softDeletes();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serie');
    }
};
