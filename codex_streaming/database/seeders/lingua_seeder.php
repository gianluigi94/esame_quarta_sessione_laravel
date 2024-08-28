<?php

namespace Database\Seeders;

use App\Models\lingua_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lingua_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        lingua_model::create([
            'codice' => 'it',
            'lingua' => 'italiano'
        ]);
        lingua_model::create([
            'codice' => 'en',
            'lingua' => 'inglese'
        ]);

        lingua_model::create([
            'codice' => 'fr',
            'lingua' => 'francese'
        ]);
    }
}
