<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnfermedadesSeeder extends Seeder
{
    public function run(): void
    {
        $enfermedades = [
            'Gripe', 'COVID-19', 'Gastroenteritis', 'Faringitis', 'Neumonía',
            'Dengue', 'Sinusitis', 'Bronquitis'
        ];

        foreach ($enfermedades as $nombre) {
            DB::table('enfermedades')->insert(['nombre' => $nombre]);
        }
    }
}