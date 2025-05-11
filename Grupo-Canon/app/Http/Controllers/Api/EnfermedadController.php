<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // <- Esta línea es clave
use App\Models\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    public function index()
    {
        return response()->json(Enfermedad::all());
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string']);
        $enfermedad = Enfermedad::create($request->all());
        return response()->json($enfermedad, 201);
    }

    public function show($id)
    {
        return response()->json(Enfermedad::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->update($request->all());
        return response()->json($enfermedad);
    }

    public function destroy($id)
    {
        Enfermedad::destroy($id);
        return response()->json(['mensaje' => 'Eliminado']);
    }
}