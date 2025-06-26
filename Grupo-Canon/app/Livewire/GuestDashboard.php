<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use App\Models\Sintoma;
use App\Models\Diagnostico;
use App\Services\DiagnosticoService;
use App\Models\PacienteDiagnostico;
use App\Models\Enfermedad;

class GuestDashboard extends Component
{
    public $nombre, $apellido, $edad, $sexo, $barrio, $ciudad;
    public $nro_documento = '0'; // Default value
    public $sintomas = [];
    public $todosLosSintomas = [];

    public function mount()
    {
        $this->todosLosSintomas = Sintoma::orderBy('nombre')->get();
    }

    public function guardar()
    {
        $this->validate([
            'nro_documento' => 'required|string|max:20',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad' => 'required|integer',
            'sexo' => 'required|in:masculino,femenino',
            'barrio' => 'required|string',
            'ciudad' => 'required|string',
            'sintomas' => 'array|min:1',
        ]);

        $paciente = Paciente::create([
            'nro_documento' => $this->nro_documento,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'barrio' => $this->barrio,
            'ciudad' => $this->ciudad,
        ]);

        foreach ($this->sintomas as $idSintoma) {
            Diagnostico::create([
                'id_paciente' => $paciente->id_paciente,
                'id_sintoma' => $idSintoma,
            ]);
        }

        // Diagnóstico automático
        $diagnosticoService = new DiagnosticoService();
        $resultados = $diagnosticoService->diagnosticar($this->sintomas);
        $primerResultado = reset($resultados);
        $enfermedad = Enfermedad::where('nombre', $primerResultado['enfermedad'])->first();
        
        PacienteDiagnostico::create([
            'id_paciente' => $paciente->id_paciente,
            'id_enfermedad' => $enfermedad->id_enfermedad,
        ]);

        // Puedes guardarlo, mostrarlo o procesarlo
        // Ejemplo: mostrarlo en la vista
        session()->flash('success', 'Paciente y síntomas guardados exitosamente.');
        session()->flash('diagnostico', $resultados);
        session()->flash('nombre', $this->nombre);
        session()->flash('apellido', $this->apellido);

$this->reset(['nombre', 'apellido', 'edad', 'sexo', 'barrio', 'ciudad', 'sintomas', 'nro_documento']);


        $this->reset(['nombre', 'apellido', 'edad', 'sexo', 'barrio', 'ciudad', 'sintomas', 'nro_documento']);
    }


    public function goToLogin()
    {
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.guest-dashboard')
            ->layout('components.layouts.app');
    }

}
