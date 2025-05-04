<?php

namespace App\Http\Controllers;

use App\Models\Sintoma;
use Illuminate\Http\Request;

class SintomaController extends Controller
{
    public function index()
    {
        return response()->json(Sintoma::all());
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string']);
        $sintoma = Sintoma::create($request->all());
        return response()->json($sintoma, 201);
    }

    public function show($id)
    {
        return response()->json(Sintoma::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $sintoma = Sintoma::findOrFail($id);
        $sintoma->update($request->all());
        return response()->json($sintoma);
    }

    public function destroy($id)
    {
        Sintoma::destroy($id);
        return response()->json(['mensaje' => 'Eliminado']);
    }
}