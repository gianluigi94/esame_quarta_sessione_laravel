<?php

namespace Database\Seeders;

use App\Models\nazione_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nazione_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/nazioni.csv");
        $file = fopen($csv, "r");
        while (($data = fgetcsv($file, 198, ",")) !== false){
            nazione_model::create(
                [
                    "id_nazione" => $data[0],
                    "nazione" => $data[1],
                    "continente" => $data[2],
                    "iso" => $data[3],
                    "iso3" => $data[4],
                    "prefisso_tel" => $data[5]
                ]
            );
        }
        fclose($file);
    }
}
