<div class="d-flex min-vh-100 bg-light">

    {{-- Sidebar --}}
    <aside class="bg-white border-end shadow-sm" style="width: 250px;">
        <div class="p-3 fw-bold border-bottom bg-primary text-white">
            Panel de Control
        </div>
        <nav class="d-grid gap-2 p-3">
            <button wire:click="$set('seccion', 'inicio')" class="btn btn-outline-primary">
                Inicio
            </button>
            <button wire:click="$set('seccion', 'sintomas')" class="btn btn-outline-primary">
                CRUD de Síntomas
            </button>
            <button wire:click="$set('seccion', 'enfermedades')" class="btn btn-outline-primary">
                CRUD de Enfermedades
            </button>
            <button wire:click="$set('seccion', 'relacion')" class="btn btn-outline-primary">
                Relación Enfermedad - Síntoma
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Cerrar Sesión
                </button>
            </form>
        </nav>
    </aside>

    {{-- Contenido Principal --}}
    <main class="flex-grow-1 p-4">
        @if ($seccion === 'inicio')
            <center><h1 class="h3 mb-4 fw-bold">Estadísticas de Pacientes</h1></center>
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
