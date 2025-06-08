<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enfermedad;

class CrudEnfermedades extends Component
{
    public $nombre, $enfermedad_id;
    public $modoEdicion = false;

    public function render()
    {
        return view('livewire.crud-enfermedades', [
            'enfermedades' => Enfermedad::all(),
        ]);
    }

    public function limpiarCampos()
    {
        $this->nombre = '';
        $this->enfermedad_id = null;
        $this->modoEdicion = false;
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Enfermedad::create([
            'nombre' => $this->nombre,
        ]);

        session()->flash('message', 'Enfermedad creada exitosamente.');
        $this->limpiarCampos();
    }

    public function editar($id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $this->enfermedad_id = $id;
        $this->nombre = $enfermedad->nombre;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $enfermedad = Enfermedad::findOrFail($this->enfermedad_id);
        $enfermedad->update([
            'nombre' => $this->nombre,
        ]);

        session()->flash('message', 'Enfermedad actualizada correctamente.');
        $this->limpiarCampos();
    }

    public function eliminar($id)
    {
        Enfermedad::destroy($id);
        session()->flash('message', 'Enfermedad eliminada.');
    }
}
