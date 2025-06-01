<?php

namespace App\Services;

use App\Models\Enfermedad;
use Illuminate\Support\Collection;

class DiagnosticoService
{
    /**
     * Retorna una lista de enfermedades con su porcentaje de coincidencia
     *
     * @param array $sintomasSeleccionados IDs de los síntomas seleccionados
     * @return array [
     *     ['enfermedad' => 'Gripe', 'porcentaje' => 60],
     *     ...
     * ]
     */
    public function diagnosticar(array $sintomasSeleccionados): array
    {
        // Obtener enfermedades que tengan al menos uno de los síntomas seleccionados
        $enfermedades = Enfermedad::with('sintomas')->get();

        $resultados = [];

        foreach ($enfermedades as $enfermedad) {
            $idsSintomasEnfermedad = $enfermedad->sintomas->pluck('id_sintoma')->toArray();

            $casosPosibles = count($idsSintomasEnfermedad);

            if ($casosPosibles === 0) {
                continue;
            }

            $casosFavorables = count(array_intersect($sintomasSeleccionados, $idsSintomasEnfermedad));

            if ($casosFavorables > 0) {
                $porcentaje = round(($casosFavorables / $casosPosibles) * 100);

                $resultados[] = [
                    'enfermedad' => $enfermedad->nombre,
                    'porcentaje' => $porcentaje,
                ];
            }
        }

        // Ordenar por mayor porcentaje
        usort($resultados, fn($a, $b) => $b['porcentaje'] <=> $a['porcentaje']);

        return $resultados;
    }
}
