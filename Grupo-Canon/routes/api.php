<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\SintomaController;
use App\Http\Controllers\Api\EnfermedadController;
use App\Http\Controllers\Api\DiagnosticoController;
use App\Http\Controllers\SintomaEnfermedadController;

Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('sintomas', SintomaController::class);
Route::apiResource('enfermedades', EnfermedadController::class);
Route::apiResource('diagnosticos', DiagnosticoController::class);
Route::apiResource('sintomas-enfermedades', SintomaEnfermedadController::class);

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});