<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintomasSeeder extends Seeder
{
    public function run(): void
    {
        $sintomas = [
            'Fiebre', 'Tos', 'Dolor de cabeza', 'Dolor de garganta', 'Congestión nasal',
            'Fatiga', 'Náuseas', 'Vómitos', 'Diarrea', 'Dolor abdominal',
            'Dolores musculares', 'Escalofríos', 'Pérdida de apetito', 'Sudoración',
            'Dolor en el pecho', 'Falta de aire', 'Pérdida del gusto', 'Pérdida del olfato',
            'Estornudos', 'Mareos'
        ];

        foreach ($sintomas as $nombre) {
            DB::table('sintomas')->insert(['nombre' => $nombre]);
        }
    }
}