<?php

namespace Database\Seeders;

use App\Models\autenticazione_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class autenticazione_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        autenticazione_model::create([
            'id_autenticazione' => 1,
            'id_contatto' => 1,
            'user' => hash('sha512', 'gian94'),
            'obbligo_cambio' => false
        ]);
        autenticazione_model::create([
            'id_autenticazione' => 2,
            'id_contatto' => 2,
            'user' => hash('sha512', 'annarossi27'),
            'obbligo_cambio' => false
        ]);
        autenticazione_model::create([
            'id_autenticazione' => 3,
            'id_contatto' => 3,
            'user' => hash('sha512', 'francescosuper'),
            'obbligo_cambio' => false
        ]);
        autenticazione_model::create([
            'id_autenticazione' => 4,
            'id_contatto' => 4,
            'user' => hash('sha512', 'robyverdiwow'),
            'obbligo_cambio' => false
        ]);
    }
}
