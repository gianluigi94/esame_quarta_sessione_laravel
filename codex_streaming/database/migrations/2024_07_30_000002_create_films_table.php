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
        Schema::create('films', function (Blueprint $table) {
            $table->id('id_film');
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->tinyInteger('durata')->unsigned();
            $table->string('regista', 45)->nullable();
            $table->string('attori', 255)->nullable();
            $table->smallInteger('anno')->unsigned()->nullable();
            $table->unsignedBigInteger('id_locandina')->nullable();
            $table->unsignedBigInteger('id_video_film')->nullable();
            $table->unsignedBigInteger('id_trailer')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
