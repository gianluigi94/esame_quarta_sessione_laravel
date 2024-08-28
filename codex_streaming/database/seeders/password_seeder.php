<?php

namespace Database\Seeders;

use App\Models\password_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class password_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        password_model::create([
            'id_contatto' => 1,
            'password' => hash('sha512', 'cAnemagico1*')
        ]);
        password_model::create([
            'id_contatto' => 2,
            'password' => hash('sha512', 'gAttomagico1*')

        ]);
        password_model::create([
            'id_contatto' => 3,
            'password' => hash('sha512', 'eLefantemagico1*')

        ]);
        password_model::create([
            'id_contatto' => 4,
            'password' => hash('sha512', 'pAperamagica1*')
        ]);

    }
}
