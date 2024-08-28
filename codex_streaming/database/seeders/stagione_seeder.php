<?php

namespace Database\Seeders;

use App\Models\stagione_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class stagione_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        stagione_model::create([
            'id_serie' => 1,
            'titolo' => 'serie 1 stagione1',
            'numero_stagione' => 1,
            'totale_episodi' => 4,
            'id_locandina' => 7
        ]);
        stagione_model::create([
            'id_serie' => 1,
            'titolo' => 'serie 1 stagione2',
            'numero_stagione' => 2,
            'totale_episodi' => 4,
            'id_locandina' => 8
        ]);
        stagione_model::create([
            'id_serie' => 1,
            'titolo' => 'serie 1 stagione3',
            'numero_stagione' => 3,
            'totale_episodi' => 4,
            'id_locandina' => 9
        ]);
        stagione_model::create([
            'id_serie' => 1,
            'titolo' => 'serie 1 stagione4',
            'numero_stagione' => 4,
            'totale_episodi' => 4,
            'id_locandina' => 10
        ]);
        stagione_model::create([
            'id_serie' => 2,
            'titolo' => 'serie 2 stagione1',
            'numero_stagione' => 1,
            'totale_episodi' => 4,
            'id_locandina' => 11
        ]);
        stagione_model::create([
            'id_serie' => 2,
            'titolo' => 'serie 2 stagione2',
            'numero_stagione' => 2,
            'totale_episodi' => 4,
            'id_locandina' => 12
        ]);
        stagione_model::create([
            'id_serie' => 2,
            'titolo' => 'serie 2 stagione3',
            'numero_stagione' => 3,
            'totale_episodi' => 4,
            'id_locandina' => 13
        ]);
        stagione_model::create([
            'id_serie' => 2,
            'titolo' => 'serie 2 stagione4',
            'numero_stagione' => 4,
            'totale_episodi' => 4,
            'id_locandina' => 14
        ]);
        stagione_model::create([
            'id_serie' => 3,
            'titolo' => 'serie 3 stagione1',
            'numero_stagione' => 1,
            'totale_episodi' => 4,
            'id_locandina' => 15
        ]);
        stagione_model::create([
            'id_serie' => 3,
            'titolo' => 'serie 3 stagione2',
            'numero_stagione' => 2,
            'totale_episodi' => 4,
            'id_locandina' => 16
        ]);
        stagione_model::create([
            'id_serie' => 3,
            'titolo' => 'serie 3 stagione3',
            'numero_stagione' => 3,
            'totale_episodi' => 4,
            'id_locandina' => 17
        ]);
        stagione_model::create([
            'id_serie' => 3,
            'titolo' => 'serie 3 stagione4',
            'numero_stagione' => 4,
            'totale_episodi' => 4,
            'id_locandina' => 18
        ]);
        stagione_model::create([
            'id_serie' => 4,
            'titolo' => 'serie 4 stagione1',
            'numero_stagione' => 1,
            'totale_episodi' => 4,
            'id_locandina' => 19
        ]);
        stagione_model::create([
            'id_serie' => 4,
            'titolo' => 'serie 4 stagione2',
            'numero_stagione' => 2,
            'totale_episodi' => 4,
            'id_locandina' => 20
        ]);
        stagione_model::create([
            'id_serie' => 4,
            'titolo' => 'serie 4 stagione3',
            'numero_stagione' => 3,
            'totale_episodi' => 4,
            'id_locandina' => 21
        ]);
        stagione_model::create([
            'id_serie' => 4,
            'titolo' => 'serie 4 stagione4',
            'numero_stagione' => 4,
            'totale_episodi' => 4,
            'id_locandina' => 22
        ]);
    }
}
