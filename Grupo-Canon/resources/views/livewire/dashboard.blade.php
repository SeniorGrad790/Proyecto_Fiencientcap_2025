<div class="d-flex min-vh-100 bg-light">

    {{-- Sidebar --}}
    <aside class="bg-white border-end shadow-sm" style="width: 250px;">
        <div class="p-3 fw-bold text-white border-bottom" style="background-color: #0b3c5d;">
            Panel de Control
        </div>
        <nav class="p-3 d-flex flex-column gap-2">
            <button wire:click="$set('seccion', 'inicio')" class="btn text-white text-start" style="background-color: #0b3c5d;">
                Inicio
            </button>
            <button wire:click="$set('seccion', 'sintomas')" class="btn text-white text-start" style="background-color: #0b3c5d;">
                CRUD de Síntomas
            </button>
            <button wire:click="$set('seccion', 'enfermedades')" class="btn text-white text-start" style="background-color: #0b3c5d;">
                CRUD de Enfermedades
            </button>
            <button wire:click="$set('seccion', 'relacion')" class="btn text-white text-start" style="background-color: #0b3c5d;">
                Relación Enfermedad - Síntoma
            </button>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-danger text-start">
                    Cerrar Sesión
                </button>
            </form>
        </nav>
    </aside>

    {{-- Contenido Principal --}}
    <main class="flex-grow-1 p-4">
        @if ($seccion === 'inicio')
            <div class="text-center">
                <h1 class="h3 mb-4 fw-bold">Estadísticas de Pacientes</h1>
            </div>
            @livewire('estadisticas-pacientes')
        @elseif ($seccion === 'sintomas')
            <h1 class="h4 mb-4">Gestión de Síntomas</h1>
            @livewire('crud-sintomas')
        @elseif ($seccion === 'enfermedades')
            <h1 class="h4 mb-4">Gestión de Enfermedades</h1>
            @livewire('crud-enfermedades')
        @elseif ($seccion === 'relacion')
            <h1 class="h4 mb-4">Relación Enfermedad - Síntoma</h1>
            @livewire('relacion-enfermedad-sintoma')
        @endif
    </main>

</div>
