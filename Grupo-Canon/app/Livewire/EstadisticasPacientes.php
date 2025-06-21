<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paciente;

class EstadisticasPacientes extends Component
{
    public $sexoData = [];
    public $edadData = [];
    public $barrioData = [];

    public int $topNBarrios = 6;

    //protected $updatesQueryString = ['topNBarrios'];

    public $ciudadData = [];
    public int $topNCiudades = 6;

    protected $updatesQueryString = ['topNBarrios', 'topNCiudades']; // opcional


    protected $rules = [
        'topNBarrios' => 'required|integer|min:1|max:20',
        'topNCiudades' => 'required|integer|min:1|max:20',
    ];


    public function updatedTopNCiudades()
    {
        $this->generarEstadisticas();
    }

    public function updatedTopNBarrios()
    {
        $this->generarEstadisticas(); // Refrescar los datos al cambiar el número
    }


    public function mount()
    {
        $this->generarEstadisticas();
    }

    public function generarEstadisticas()
    {
        $pacientes = Paciente::all();

        // --- Gráfico por Sexo ---
        $hombres = $pacientes->where('sexo', 'masculino')->count();
        $mujeres = $pacientes->where('sexo', 'femenino')->count();
        $totalSexo = max(1, $hombres + $mujeres); // evitar división por cero

        $this->sexoData = [
            'labels' => ['Hombres', 'Mujeres'],
            'values' => [
                round(($hombres / $totalSexo) * 100, 2),
                round(($mujeres / $totalSexo) * 100, 2),
            ]
        ];

        // --- Gráfico por Edad ---
        $rangos = [
            '0-11' => 0,
            '12-18' => 0,
            '19-30' => 0,
            '31-60' => 0,
            '61+' => 0,
        ];

        foreach ($pacientes as $p) {
            $edad = $p->edad;
            if ($edad <= 11) $rangos['0-11']++;
            elseif ($edad <= 18) $rangos['12-18']++;
            elseif ($edad <= 30) $rangos['19-30']++;
            elseif ($edad <= 60) $rangos['31-60']++;
            else $rangos['61+']++;
        }

        $this->edadData = [
            'labels' => array_keys($rangos),
            'values' => array_values($rangos),
        ];

        // --- Gráfico por Barrio (normalizado) ---
        $barriosRaw = [];

        foreach ($pacientes as $p) {
            $original = trim($p->barrio);
            $normalizado = $this->normalizarTexto($original);

            if (!isset($barriosRaw[$normalizado])) {
                $barriosRaw[$normalizado] = ['count' => 0, 'originales' => []];
            }

            $barriosRaw[$normalizado]['count']++;
            $barriosRaw[$normalizado]['originales'][$original] =
                ($barriosRaw[$normalizado]['originales'][$original] ?? 0) + 1;
        }

        $barriosFinal = collect($barriosRaw)->map(function ($info) {
            arsort($info['originales']); // Ordenar por ocurrencias
            $nombreMasFrecuente = array_key_first($info['originales']);
            return [
                'nombre' => $nombreMasFrecuente,
                'count' => $info['count']
            ];
        });

        $barriosOrdenados = $barriosFinal->sortByDesc('count');

        $top = $barriosOrdenados->take($this->topNBarrios);
        $otros = $barriosOrdenados->skip($this->topNBarrios)->sum('count');

        $labels = $top->pluck('nombre')->toArray();
        $values = $top->pluck('count')->toArray();

        if ($otros > 0) {
            $labels[] = 'Otros';
            $values[] = $otros;
        }

        $this->barrioData = [
            'labels' => $labels,
            'values' => $values,
        ];

        // --- Gráfico por Ciudad (normalizado) ---
    $ciudadesRaw = [];

    foreach ($pacientes as $p) {
        $original = trim($p->ciudad);
        $normalizado = $this->normalizarTexto($original);

        if (!isset($ciudadesRaw[$normalizado])) {
            $ciudadesRaw[$normalizado] = ['count' => 0, 'originales' => []];
        }

        $ciudadesRaw[$normalizado]['count']++;
        $ciudadesRaw[$normalizado]['originales'][$original] =
            ($ciudadesRaw[$normalizado]['originales'][$original] ?? 0) + 1;
    }

    $ciudadesFinal = collect($ciudadesRaw)->map(function ($info) {
        arsort($info['originales']);
        $nombreMasFrecuente = array_key_first($info['originales']);
        return [
            'nombre' => $nombreMasFrecuente,
            'count' => $info['count']
        ];
    });

    $ciudadesOrdenadas = $ciudadesFinal->sortByDesc('count');

    $top = $ciudadesOrdenadas->take($this->topNCiudades);
    $otros = $ciudadesOrdenadas->skip($this->topNCiudades)->sum('count');

    $labels = $top->pluck('nombre')->toArray();
    $values = $top->pluck('count')->toArray();

    if ($otros > 0) {
        $labels[] = 'Otros';
        $values[] = $otros;
    }

    $this->ciudadData = [
        'labels' => $labels,
        'values' => $values,
    ];

    }

    /**
     * Normaliza un texto: pasa a minúsculas, elimina acentos y caracteres especiales.
     */
    private function normalizarTexto($texto)
    {
        $texto = mb_strtolower($texto, 'UTF-8');
        $texto = preg_replace('/[áàäâ]/u', 'a', $texto);
        $texto = preg_replace('/[éèëê]/u', 'e', $texto);
        $texto = preg_replace('/[íìïî]/u', 'i', $texto);
        $texto = preg_replace('/[óòöô]/u', 'o', $texto);
        $texto = preg_replace('/[úùüû]/u', 'u', $texto);
        $texto = preg_replace('/ñ/u', 'n', $texto);
        $texto = preg_replace('/[^a-z0-9 ]/u', '', $texto);
        return trim($texto);
    }

    public function render()
    {
        return view('livewire.estadisticas-pacientes');
    }
}
