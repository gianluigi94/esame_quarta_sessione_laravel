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
        Schema::create('episodi', function (Blueprint $table) {
            $table->id('id_episodio');
            $table->unsignedBigInteger('id_serie');
            $table->unsignedBigInteger('id_stagione');
            $table->smallInteger('numero_stagione')->unsigned()->nullable();
            $table->smallInteger('numero_episodio')->unsigned()->nullable();
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->tinyInteger('durata')->unsigned();
            $table->smallInteger('anno')->unsigned()->nullable();
            $table->unsignedBigInteger('id_video_episodio');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodi');
    }
};
