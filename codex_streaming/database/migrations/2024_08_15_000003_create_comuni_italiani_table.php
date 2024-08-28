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
    Schema::create('comuni_italiani', function (Blueprint $table) {
        $table->id('id_comune_italiano');
        $table->string('comune', 45);
        $table->string('sigla_automobilistica', 2);
        $table->string('codice_belfiore', 4);
        $table->double('lat', 15, 8)->nullable();
        $table->double('lon', 15, 8)->nullable();
        $table->string('cap', 10)->nullable();
        $table->boolean('capoluogo')->default(false);
        $table->boolean('multi_cap')->default(false);
        $table->string('cap_inizio', 10)->nullable();
        $table->string('cap_fine', 10)->nullable();
        $table->softDeletes();
        $table->timestamps();
    });

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comuni_italiani');
    }
};
