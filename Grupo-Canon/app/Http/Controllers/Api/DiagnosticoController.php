<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; // <- Esta línea es clave
use App\Models\Diagnostico;
use Illuminate\Http\Request;
use App\Models\Paciente;

class DiagnosticoController extends Controller
{
    public function guardar(Request $request)
    {
        $paciente = Paciente::create($request->only('nombre', 'apellido', 'edad', 'sexo', 'barrio', 'ciudad'));

        foreach ($request->sintomas as $id_sintoma) {
            Diagnostico::create([
                'id_paciente' => $paciente->id_paciente,
                'id_sintoma' => $id_sintoma
            ]);
        }

        return redirect()->route('invitado')->with('success', 'Diagnóstico guardado');
    }
    public function index()
    {
        return response()->json(Diagnostico::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_paciente' => 'required|exists:pacientes,id_paciente',
            'id_sintoma' => 'required|exists:sintomas,id_sintoma'
        ]);
        $diagnostico = Diagnostico::create($request->all());
        return response()->json($diagnostico, 201);
    }

    public function show($id)
    {
        return response()->json(Diagnostico::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->update($request->all());
        return response()->json($diagnostico);
    }

    public function destroy($id)
    {
        Diagnostico::destroy($id);
        return response()->json(['mensaje' => 'Eliminado']);
    }
}