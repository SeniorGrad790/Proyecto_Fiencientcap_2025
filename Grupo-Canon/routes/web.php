<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DiagnosticoController;

Route::get('/invitado', function () {
    return view('invitado.paciente');
})->name('invitado');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/diagnostico', [DiagnosticoController::class, 'guardar'])->name('diagnostico.guardar');
