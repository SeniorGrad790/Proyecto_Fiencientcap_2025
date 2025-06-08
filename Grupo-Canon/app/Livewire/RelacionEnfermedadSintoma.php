<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Enfermedad;
use App\Models\Sintoma;
use App\Models\SintomaEnfermedad;

class RelacionEnfermedadSintoma extends Component
{
    public $enfermedades;
    public $sintomas;
    public $enfermedadSeleccionada = null;
    public $sintomasSeleccionados = [];

    public function mount()
    {
        $this->enfermedades = Enfermedad::all();
        $this->sintomas = Sintoma::all();
    }

    public function updated($property)
    {
        
        if ($property === 'enfermedadSeleccionada') {
            $this->cargarSintomasRelacionados();
        }
    }


    public function cargarSintomasRelacionados()
    {
        $this->sintomasSeleccionados = []; // limpiar primero

        $enfermedad = Enfermedad::with('sintomas')->find($this->enfermedadSeleccionada);

        if ($enfermedad) {
            $this->sintomasSeleccionados = $enfermedad->sintomas->pluck('id_sintoma')->toArray();
        }
    }


    public function guardarRelacion()
    {
        if (!$this->enfermedadSeleccionada) return;

        $enfermedad = Enfermedad::find($this->enfermedadSeleccionada);
        $enfermedad->sintomas()->sync($this->sintomasSeleccionados);

        session()->flash('message', 'Relaciones actualizadas correctamente.');
    }

    public function render()
    {
        return view('livewire.relacion-enfermedad-sintoma');
    }
}
