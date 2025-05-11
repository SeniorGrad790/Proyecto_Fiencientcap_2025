<?php

namespace App\Http\Controllers;

use App\Models\SintomaEnfermedad;
use Illuminate\Http\Request;

class SintomaEnfermedadController extends Controller
{
    public function index()
    {
        return response()->json(SintomaEnfermedad::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sintoma' => 'required|exists:sintomas,id_sintoma',
            'id_enfermedad' => 'required|exists:enfermedades,id_enfermedad'
        ]);

        $relacion = SintomaEnfermedad::create($request->all());
        return response()->json($relacion, 201);
    }

    public function show($id)
    {
        return response()->json(SintomaEnfermedad::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $relacion = SintomaEnfermedad::findOrFail($id);
        $relacion->update($request->all());
        return response()->json($relacion);
    }

    public function destroy($id)
    {
        SintomaEnfermedad::destroy($id);
        return response()->json(['mensaje' => 'Eliminado']);
    }
}