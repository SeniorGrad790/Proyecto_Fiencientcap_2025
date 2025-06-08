@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100" x-data="{ seccion: 'inicio' }">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-4 text-xl font-bold border-b">App Livewire</div>
        <nav class="p-4 space-y-2">
            <button @click="seccion = 'inicio'" class="block w-full text-left px-4 py-2 rounded hover:bg-gray-200">Inicio</button>
            <button @click="seccion = 'sintomas'" class="block w-full text-left px-4 py-2 rounded hover:bg-gray-200">CRUD de Síntomas</button>
            <button @click="seccion = 'enfermedades'" class="block w-full text-left px-4 py-2 rounded hover:bg-gray-200">CRUD de Enfermedades</button>
            <button @click="seccion = 'relacion'" class="block w-full text-left px-4 py-2 rounded hover:bg-gray-200">Relación Enfermedad - Síntoma</button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 rounded hover:bg-red-200 text-red-600">Cerrar Sesión</button>
            </form>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
        <div x-show="seccion === 'inicio'" x-cloak>
            <h1 class="text-2xl font-semibold">Bienvenido al Dashboard</h1>
        </div>

        <div x-show="seccion === 'sintomas'" x-cloak>
            @livewire('crud-sintomas')
        </div>

        <div x-show="seccion === 'enfermedades'" x-cloak>
            @livewire('crud-sintomas')
        </div>

        <div x-show="seccion === 'relacion'" x-cloak>
            @livewire('crud-sintomas')
        </div>
    </main>
</div>
@endsection
