<?php

namespace Database\Seeders;

use App\Models\abilita_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class abilita_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        abilita_model::create([
            'nome' => 'leggere',
            'sku' => 'leggere'
        ]);
        abilita_model::create([
            'nome' => 'creare',
            'sku' => 'creare'
        ]);
        abilita_model::create([
            'nome' => 'aggiornare',
            'sku' => 'aggiornare'
        ]);
        abilita_model::create([
            'nome' => 'eliminare',
            'sku' => 'eliminare'
        ]);
    }
}
