<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required|integer',
            'sexo' => 'required|in:masculino,femenino',
            'barrio' => 'required',
            'ciudad' => 'required',
        ]);

        Paciente::create($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente.');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required|integer',
            'sexo' => 'required|in:masculino,femenino',
            'barrio' => 'required',
            'ciudad' => 'required',
        ]);

        $paciente->update($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente.');
    }
}
