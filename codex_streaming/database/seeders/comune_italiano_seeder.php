<?php

namespace Database\Seeders;

use App\Models\comune_italiano_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class comune_italiano_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/comuni_italiani.csv");
        $file = fopen($csv, "r");

        // Salta l'intestazione se presente nel CSV
        $header = fgetcsv($file, 0, ";");

        while (($data = fgetcsv($file, 0, ";")) !== false) {
            comune_italiano_model::create([
                "id_comune_italiano"   => $data[0],
                "comune"               => $data[1],
                "sigla_automobilistica" => $data[2],
                "codice_belfiore"      => $data[3],
                "lat"                  => str_replace(',', '.', $data[4]) !== '' ? str_replace(',', '.', $data[4]) : null,
                "lon"                  => str_replace(',', '.', $data[5]) !== '' ? str_replace(',', '.', $data[5]) : null,
                "cap"                  => $data[6],
                "capoluogo"            => $data[7],
                "multi_cap"            => $data[8],
                "cap_inizio"           => $data[9],
                "cap_fine"             => $data[10]
            ]);
        }

        fclose($file);
    }
}
