<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sintoma;

class CrudSintomas extends Component
{
    public $sintomas;
    public $nombre;
    public $sintoma_id;
    public $modoEdicion = false;

    protected $rules = [
        'nombre' => 'required|string|max:255',
    ];

    public function render()
    {
        $this->sintomas = Sintoma::all();
        return view('livewire.crud-sintomas');
    }

    public function guardar()
    {
        $this->validate();

        Sintoma::create(['nombre' => $this->nombre]);

        $this->reset(['nombre']);
        $this->nombre = '';
        session()->flash('mensaje', 'Síntoma agregado correctamente.');
    }

    public function editar($id)
    {
        $sintoma = Sintoma::findOrFail($id);
        $this->sintoma_id = $sintoma->id_sintoma;
        $this->nombre = $sintoma->nombre;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate();

        $sintoma = Sintoma::findOrFail($this->sintoma_id);
        $sintoma->update(['nombre' => $this->nombre]);

        $this->reset(['nombre', 'sintoma_id', 'modoEdicion']);
        session()->flash('mensaje', 'Síntoma actualizado correctamente.');
    }

    public function eliminar($id)
    {
        Sintoma::destroy($id);
        session()->flash('mensaje', 'Síntoma eliminado.');
    }

    public function cancelar()
    {
        $this->reset(['nombre', 'sintoma_id', 'modoEdicion']);
    }
}
