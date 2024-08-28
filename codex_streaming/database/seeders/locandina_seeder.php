<?php

namespace Database\Seeders;

use App\Models\locandina_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class locandina_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locandine')->truncate();
        locandina_model::create([
            'id_locandina' => 1,
            'id_file' => 1,
            'nome' => 'file_locandina1'
        ]);
        locandina_model::create([
            'id_locandina' => 2,
            'id_file' => 2,
            'nome' => 'file_locandina2'

        ]);
        locandina_model::create([
            'id_locandina' => 3,
            'id_file' => 3,
            'nome' => 'file_locandina3'

        ]);
        locandina_model::create([
            'id_locandina' => 4,
            'id_file' => 4,
            'nome' => 'file_locandina4'

        ]);
        locandina_model::create([
            'id_locandina' => 5,
            'id_file' => 5,
            'nome' => 'file_locandina5'

        ]);
        locandina_model::create([
            'id_locandina' => 6,
            'id_file' => 6,
            'nome' => 'file_locandina6'

        ]);
        locandina_model::create([
            'id_locandina' => 7,
            'id_file' => 7,
            'nome' => 'file_locandina7'

        ]);
        locandina_model::create([
            'id_locandina' => 8,
            'id_file' => 8,
            'nome' => 'file_locandina8'

        ]);
        locandina_model::create([
            'id_locandina' => 9,
            'id_file' => 9,
            'nome' => 'file_locandina9'

        ]);
        locandina_model::create([
            'id_locandina' => 10,
            'id_file' => 10,
            'nome' => 'file_locandina10'

        ]);
        locandina_model::create([
            'id_locandina' => 11,
            'id_file' => 11,
            'nome' => 'file_locandina11'

        ]);
        locandina_model::create([
            'id_locandina' => 12,
            'id_file' => 12,
            'nome' => 'file_locandina12'

        ]);
        locandina_model::create([
            'id_locandina' => 13,
            'id_file' => 13,
            'nome' => 'file_locandina13'

        ]);
        locandina_model::create([
            'id_locandina' => 14,
            'id_file' => 14,
            'nome' => 'file_locandina14'

        ]);
        locandina_model::create([
            'id_locandina' => 15,
            'id_file' => 15,
            'nome' => 'file_locandina15'

        ]);
        locandina_model::create([
            'id_locandina' => 16,
            'id_file' => 16,
            'nome' => 'file_locandina16'

        ]);
        locandina_model::create([
            'id_locandina' => 17,
            'id_file' => 17,
            'nome' => 'file_locandina17'

        ]);
        locandina_model::create([
            'id_locandina' => 18,
            'id_file' => 18,
            'nome' => 'file_locandina18'

        ]);
        locandina_model::create([
            'id_locandina' => 19,
            'id_file' => 19,
            'nome' => 'file_locandina19'

        ]);
        locandina_model::create([
            'id_locandina' => 20,
            'id_file' => 20,
            'nome' => 'file_locandina20'

        ]);
        locandina_model::create([
            'id_locandina' => 21,
            'id_file' => 21,
            'nome' => 'file_locandina21'

        ]);
        locandina_model::create([
            'id_locandina' => 22,
            'id_file' => 22,
            'nome' => 'file_locandina22'
        ]);
    }
}
