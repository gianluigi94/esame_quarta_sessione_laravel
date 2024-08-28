<?php

namespace Database\Seeders;

use App\Models\ruolo_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ruolo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ruolo_model::create(['ruolo' => 'amministratore']);
        ruolo_model::create(['ruolo' => 'utente']);
        ruolo_model::create(['ruolo' => 'ospite']);
    }
}
