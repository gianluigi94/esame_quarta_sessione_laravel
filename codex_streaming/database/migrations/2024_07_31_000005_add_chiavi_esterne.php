<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // migro in un secondo momento le chiavi esterne per evitare errori
        Schema::table('films', function (Blueprint $table) {
            $table->foreign('id_categoria')->references('id_categoria')->on('categorie');
            $table->foreign('id_locandina')->references('id_locandina')->on('locandine');
            $table->foreign('id_video_film')->references('id_video_film')->on('video_films');
            $table->foreign('id_trailer')->references('id_trailer')->on('trailers');
        });

        Schema::table('serie', function (Blueprint $table) {
            $table->foreign('id_categoria')->references('id_categoria')->on('categorie');
            $table->foreign('id_locandina')->references('id_locandina')->on('locandine');
            $table->foreign('id_trailer')->references('id_trailer')->on('trailers');
        });

        Schema::table('stagioni', function (Blueprint $table) {
            $table->foreign('id_locandina')->references('id_locandina')->on('locandine');
            $table->foreign('id_serie')->references('id_serie')->on('serie');
        });

        Schema::table('episodi', function (Blueprint $table) {
            $table->foreign('id_stagione')->references('id_stagione')->on('stagioni');
            $table->foreign('id_serie')->references('id_serie')->on('serie');
            $table->foreign('id_video_episodio')->references('id_video_episodio')->on('video_episodi');
        });

        Schema::table('recapiti', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
            $table->foreign('id_tipo_recapito')->references('id_tipo_recapito')->on('tipi_recapiti');
        });
        Schema::table('contatti', function (Blueprint $table) {
            $table->foreign('id_stato_utente')->references('id_stato_utente')->on('stati_utenti');
        });
        Schema::table('autenticazioni', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
        });
        Schema::table('accessi', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
        });
        Schema::table('password', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
        });
        Schema::table('sessioni', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
        });
        Schema::table('contatti_ruoli', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
            $table->foreign('id_ruolo')->references('id_ruolo')->on('ruoli');
        });
        Schema::table('ruoli_abilita', function (Blueprint $table) {
            $table->foreign('id_ruolo')->references('id_ruolo')->on('ruoli');
            $table->foreign('id_abilita')->references('id_abilita')->on('abilita');
        });
        Schema::table('locandine', function (Blueprint $table) {
            $table->foreign('id_file')->references('id_file')->on('file');
        });
        Schema::table('video_films', function (Blueprint $table) {
            $table->foreign('id_file')->references('id_file')->on('file');
        });
        Schema::table('video_episodi', function (Blueprint $table) {
            $table->foreign('id_file')->references('id_file')->on('file');
        });
        Schema::table('trailers', function (Blueprint $table) {
            $table->foreign('id_file')->references('id_file')->on('file');
        });
        Schema::table('indirizzi', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
            $table->foreign('id_nazione')->references('id_nazione')->on('nazioni');
            $table->foreign('id_comune_italiano')->references('id_comune_italiano')->on('comuni_italiani');
            $table->foreign('id_tipo_indirizzo')->references('id_tipo_indirizzo')->on('tipo_indirizzi');
        });
        Schema::table('crediti', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
        });
        Schema::table('transazioni', function (Blueprint $table) {
            $table->foreign('id_credito')->references('id_credito')->on('crediti');
        });
        Schema::table('contatti_has_films', function (Blueprint $table) {
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
            $table->foreign('id_film')->references('id_film')->on('films');
        });
        Schema::table('serie_has_contatti', function (Blueprint $table) {
            $table->foreign('id_serie')->references('id_serie')->on('serie');
            $table->foreign('id_contatto')->references('id_contatto')->on('contatti');
        });
        Schema::table('traduzioni', function (Blueprint $table) {
            $table->foreign('id_lingua')->references('id_lingua')->on('lingue');
        });
        Schema::table('traduzioni_custom', function (Blueprint $table) {
            $table->foreign('id_lingua')->references('id_lingua')->on('lingue');
            $table->foreign('id_traduzione')->references('id_traduzione')->on('traduzioni');
        });

    }

};


