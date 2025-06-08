<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Relacionar Enfermedad con Síntomas</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Cabecera: Selección de enfermedad -->
    <div class="mb-6">
        <label class="block font-medium text-sm text-gray-700 mb-1">Enfermedad</label>
        <select wire:model="enfermedadSeleccionada" class="w-full border rounded px-3 py-2">
            <option value="">-- Selecciona una enfermedad --</option>
            @foreach ($enfermedades as $enfermedad)
                <option value="{{ $enfermedad->id_enfermedad }}">{{ $enfermedad->nombre }}</option>
            @endforeach
        </select>
        <button wire:click="cargarSintomasRelacionados" class="mt-2 text-sm text-blue-600 underline">
            Cargar síntomas
        </button>

    </div>

    <!-- Detalle: Síntomas relacionados -->
    @if ($enfermedadSeleccionada)
        <div class="mb-6">
            <label class="block font-medium text-sm text-gray-700 mb-2">Síntomas</label>
            <div class="grid grid-cols-2 gap-2" wire:key="detalle-{{ $enfermedadSeleccionada }}">
                @foreach ($sintomas as $sintoma)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" wire:model="sintomasSeleccionados" value="{{ $sintoma->id_sintoma }}">
                        <span>{{ $sintoma->nombre }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <button wire:click="guardarRelacion" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                Guardar relación
            </button>
        </div>
    @endif
</div>
