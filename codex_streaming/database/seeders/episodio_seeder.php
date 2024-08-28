<?php

namespace Database\Seeders;

use App\Models\episodio_model;
use App\Models\stagione_model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class episodio_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 1,
            'numero_episodio' => 1,
            'numero_stagione' => 1,
            'titolo' => 'serie1 stagione1 episodio1',
            'descrizione' => 'descrizione bella',
            'durata' => '100',
            'anno' => '2020',
            'id_video_episodio' => 1
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 2,
            'numero_episodio' => 2,
            'numero_stagione' => 1,
            'titolo' => 'serie1 stagione1 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 2
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 3,
            'numero_episodio' => 3,
            'numero_stagione' => 1,
            'titolo' => 'serie1 stagione1 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 3
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 4,
            'numero_episodio' => 4,
            'numero_stagione' => 1,
            'titolo' => 'serie1 stagione1 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 4
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 5,
            'numero_episodio' => 1,
            'numero_stagione' => 2,
            'titolo' => 'serie1 stagione2 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 5
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 6,
            'numero_episodio' => 2,
            'numero_stagione' => 2,
            'titolo' => 'serie1 stagione2 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 6
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 7,
            'numero_episodio' => 3,
            'numero_stagione' => 2,
            'titolo' => 'serie1 stagione2 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 7
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 8,
            'numero_episodio' => 4,
            'numero_stagione' => 2,
            'titolo' => 'serie1 stagione2 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 8
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 9,
            'numero_episodio' => 1,
            'numero_stagione' =>3,
            'titolo' => 'serie1 stagione3 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 9
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 10,
            'numero_episodio' => 2,
            'numero_stagione' =>3,
            'titolo' => 'serie1 stagione3 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 10
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 11,
            'numero_episodio' => 3,
            'numero_stagione' =>3,
            'titolo' => 'serie1 stagione3 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 11
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 12,
            'numero_episodio' => 4,
            'numero_stagione' =>3,
            'titolo' => 'serie1 stagione3 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 12
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 13,
            'numero_episodio' => 1,
            'numero_stagione' => 4,
            'titolo' => 'serie1 stagione4 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 13
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 14,
            'numero_episodio' => 2,
            'numero_stagione' => 4,
            'titolo' => 'serie1 stagione4 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 14
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 15,
            'numero_episodio' => 3,
            'numero_stagione' => 4,
            'titolo' => 'serie1 stagione4 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 15
        ]);
        episodio_model::create([
            'id_serie' => 1,
            'id_stagione' => 16,
            'numero_episodio' => 4,
            'numero_stagione' => 4,
            'titolo' => 'serie1 stagione4 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 16
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 1,
            'numero_episodio' => 1,
            'numero_stagione' => 1,
            'titolo' => 'serie2 stagione1 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 17
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 2,
            'numero_episodio' => 2,
            'numero_stagione' => 1,
            'titolo' => 'serie2 stagione1 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 18
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 3,
            'numero_episodio' => 3,
            'numero_stagione' => 1,
            'titolo' => 'serie2 stagione1 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 19
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 4,
            'numero_episodio' => 4,
            'numero_stagione' => 1,
            'titolo' => 'serie2 stagione1 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 20
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 5,
            'numero_episodio' => 1,
            'numero_stagione' => 2,
            'titolo' => 'serie2 stagione2 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 21
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 6,
            'numero_episodio' => 2,
            'numero_stagione' => 2,
            'titolo' => 'serie2 stagione2 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 22
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 7,
            'numero_episodio' => 3,
            'numero_stagione' => 2,
            'titolo' => 'serie2 stagione2 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 23
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 8,
            'numero_episodio' => 4,
            'numero_stagione' => 2,
            'titolo' => 'serie2 stagione2 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 24
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 9,
            'numero_episodio' => 1,
            'numero_stagione' =>3,
            'titolo' => 'serie2 stagione3 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 25
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 10,
            'numero_episodio' => 2,
            'numero_stagione' =>3,
            'titolo' => 'serie2 stagione3 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 26
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 11,
            'numero_episodio' => 3,
            'numero_stagione' =>3,
            'titolo' => 'serie2 stagione3 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 27
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 12,
            'numero_episodio' => 4,
            'numero_stagione' =>3,
            'titolo' => 'serie2 stagione3 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 28
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 13,
            'numero_episodio' => 1,
            'numero_stagione' => 4,
            'titolo' => 'serie2 stagione4 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 29
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 14,
            'numero_episodio' => 2,
            'numero_stagione' => 4,
            'titolo' => 'serie2 stagione4 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 30
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 15,
            'numero_episodio' => 3,
            'numero_stagione' => 4,
            'titolo' => 'serie2 stagione4 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 31
        ]);
        episodio_model::create([
            'id_serie' => 2,
            'id_stagione' => 16,
            'numero_episodio' => 4,
            'numero_stagione' => 4,
            'titolo' => 'serie2 stagione4 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 32
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 1,
            'numero_episodio' => 1,
            'numero_stagione' => 1,
            'titolo' => 'serie3 stagione1 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 33
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 2,
            'numero_episodio' => 2,
            'numero_stagione' => 1,
            'titolo' => 'serie3 stagione1 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 34
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 3,
            'numero_episodio' => 3,
            'numero_stagione' => 1,
            'titolo' => 'serie3 stagione1 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 35
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 4,
            'numero_episodio' => 4,
            'numero_stagione' => 1,
            'titolo' => 'serie3 stagione1 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 36
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 5,
            'numero_episodio' => 1,
            'numero_stagione' => 2,
            'titolo' => 'serie3 stagione2 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 37
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 6,
            'numero_episodio' => 2,
            'numero_stagione' => 2,
            'titolo' => 'serie3 stagione2 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 38
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 7,
            'numero_episodio' => 3,
            'numero_stagione' => 2,
            'titolo' => 'serie3 stagione2 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 39
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 8,
            'numero_episodio' => 4,
            'numero_stagione' => 2,
            'titolo' => 'serie3 stagione2 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 40
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 9,
            'numero_episodio' => 1,
            'numero_stagione' =>3,
            'titolo' => 'serie3 stagione3 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 41
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 10,
            'numero_episodio' => 2,
            'numero_stagione' =>3,
            'titolo' => 'serie3 stagione3 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 42
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 11,
            'numero_episodio' => 3,
            'numero_stagione' =>3,
            'titolo' => 'serie3 stagione3 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 43
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 12,
            'numero_episodio' => 4,
            'numero_stagione' =>3,
            'titolo' => 'serie3 stagione3 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 44
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 13,
            'numero_episodio' => 1,
            'numero_stagione' => 4,
            'titolo' => 'serie3 stagione4 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 45
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 14,
            'numero_episodio' => 2,
            'numero_stagione' => 4,
            'titolo' => 'serie3 stagione4 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 46
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 15,
            'numero_episodio' => 3,
            'numero_stagione' => 4,
            'titolo' => 'serie3 stagione4 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 47
        ]);
        episodio_model::create([
            'id_serie' => 3,
            'id_stagione' => 16,
            'numero_episodio' => 4,
            'numero_stagione' => 4,
            'titolo' => 'serie3 stagione4 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 48
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 1,
            'numero_episodio' => 1,
            'numero_stagione' => 1,
            'titolo' => 'serie4 stagione1 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 49
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 2,
            'numero_episodio' => 2,
            'numero_stagione' => 1,
            'titolo' => 'serie4 stagione1 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 50
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 3,
            'numero_episodio' => 3,
            'numero_stagione' => 1,
            'titolo' => 'serie4 stagione1 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 51
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 4,
            'numero_episodio' => 4,
            'numero_stagione' => 1,
            'titolo' => 'serie4 stagione1 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 52
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 5,
            'numero_episodio' => 1,
            'numero_stagione' => 2,
            'titolo' => 'serie4 stagione2 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 53
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 6,
            'numero_episodio' => 2,
            'numero_stagione' => 2,
            'titolo' => 'serie4 stagione2 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 54
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 7,
            'numero_episodio' => 3,
            'numero_stagione' => 2,
            'titolo' => 'serie4 stagione2 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 55
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 8,
            'numero_episodio' => 4,
            'numero_stagione' => 2,
            'titolo' => 'serie4 stagione2 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 56
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 9,
            'numero_episodio' => 1,
            'numero_stagione' =>3,
            'titolo' => 'serie4 stagione3 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 57
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 10,
            'numero_episodio' => 2,
            'numero_stagione' =>3,
            'titolo' => 'serie4 stagione3 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 58
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 11,
            'numero_episodio' => 3,
            'numero_stagione' =>3,
            'titolo' => 'serie4 stagione3 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 59
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 12,
            'numero_episodio' => 4,
            'numero_stagione' =>3,
            'titolo' => 'serie4 stagione3 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 60
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 13,
            'numero_episodio' => 1,
            'numero_stagione' => 4,
            'titolo' => 'serie4 stagione4 episodio1',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 61
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 14,
            'numero_episodio' => 2,
            'numero_stagione' => 4,
            'titolo' => 'serie4 stagione4 episodio2',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 62
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 15,
            'numero_episodio' => 3,
            'numero_stagione' => 4,
            'titolo' => 'serie4 stagione4 episodio3',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 63
        ]);
        episodio_model::create([
            'id_serie' => 4,
            'id_stagione' => 16,
            'numero_episodio' => 4,
            'numero_stagione' => 4,
            'titolo' => 'serie4 stagione4 episodio4',
            'descrizione' => 'descrizione bella2',
            'durata' => '110',
            'anno' => '2020',
            'id_video_episodio' => 64
        ]);
    }
}
