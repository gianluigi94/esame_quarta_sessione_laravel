<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class contatto_ruolo_seeder extends Seeder
{
    public function run()
    {
        DB::table('contatti_ruoli')->insert([
            ['id_contatto' => 1, 'id_ruolo' => 1],
            ['id_contatto' => 1, 'id_ruolo' => 2],
            ['id_contatto' => 2, 'id_ruolo' => 2],
            ['id_contatto' => 3, 'id_ruolo' => 3],
            ['id_contatto' => 4, 'id_ruolo' => 3],
        ]);
    }
}

