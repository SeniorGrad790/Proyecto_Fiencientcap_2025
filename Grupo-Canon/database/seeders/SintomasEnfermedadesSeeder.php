<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintomasEnfermedadesSeeder extends Seeder
{
    public function run(): void
    {
        // Definimos las relaciones manualmente
        $relaciones = [
            // Gripe - id 1
            ['id_enfermedad' => 1, 'id_sintoma' => 1],
            ['id_enfermedad' => 1, 'id_sintoma' => 2],
            ['id_enfermedad' => 1, 'id_sintoma' => 3],
            ['id_enfermedad' => 1, 'id_sintoma' => 6],
            ['id_enfermedad' => 1, 'id_sintoma' => 11],

            // COVID-19 - id 2
            ['id_enfermedad' => 2, 'id_sintoma' => 1],
            ['id_enfermedad' => 2, 'id_sintoma' => 2],
            ['id_enfermedad' => 2, 'id_sintoma' => 3],
            ['id_enfermedad' => 2, 'id_sintoma' => 16],
            ['id_enfermedad' => 2, 'id_sintoma' => 17],
            ['id_enfermedad' => 2, 'id_sintoma' => 18],

            // Gastroenteritis - id 3
            ['id_enfermedad' => 3, 'id_sintoma' => 7],
            ['id_enfermedad' => 3, 'id_sintoma' => 8],
            ['id_enfermedad' => 3, 'id_sintoma' => 9],
            ['id_enfermedad' => 3, 'id_sintoma' => 10],

            // Faringitis - id 4
            ['id_enfermedad' => 4, 'id_sintoma' => 2],
            ['id_enfermedad' => 4, 'id_sintoma' => 4],
            ['id_enfermedad' => 4, 'id_sintoma' => 5],

            // Neumonía - id 5
            ['id_enfermedad' => 5, 'id_sintoma' => 2],
            ['id_enfermedad' => 5, 'id_sintoma' => 6],
            ['id_enfermedad' => 5, 'id_sintoma' => 15],
            ['id_enfermedad' => 5, 'id_sintoma' => 16],

            // Dengue - id 6
            ['id_enfermedad' => 6, 'id_sintoma' => 1],
            ['id_enfermedad' => 6, 'id_sintoma' => 11],
            ['id_enfermedad' => 6, 'id_sintoma' => 13],
            ['id_enfermedad' => 6, 'id_sintoma' => 14],

            // Sinusitis - id 7
            ['id_enfermedad' => 7, 'id_sintoma' => 5],
            ['id_enfermedad' => 7, 'id_sintoma' => 3],
            ['id_enfermedad' => 7, 'id_sintoma' => 19],

            // Bronquitis - id 8
            ['id_enfermedad' => 8, 'id_sintoma' => 2],
            ['id_enfermedad' => 8, 'id_sintoma' => 5],
            ['id_enfermedad' => 8, 'id_sintoma' => 15],
        ];

        DB::table('sintomas_enfermedades')->insert($relaciones);
    }
}