<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Gestión de Síntomas</h2>

    @if (session()->has('mensaje'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('mensaje') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}" class="mb-6 space-y-4">
        <div>
            <input type="text" wire:model="nombre" placeholder="Nombre del síntoma"
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring" />
            @error('nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded">
                {{ $modoEdicion ? 'Actualizar' : 'Agregar' }}
            </button>
            @if($modoEdicion)
                <button type="button" wire:click="cancelar"
                        class="bg-gray-400 hover:bg-gray-500 text-black px-4 py-2 rounded">
                    Cancelar
                </button>
            @endif
        </div>
    </form>

    <table class="w-full table table-striped">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sintomas as $sintoma)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $sintoma->id_sintoma }}</td>
                    <td class="px-4 py-2">{{ $sintoma->nombre }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <button wire:click="editar({{ $sintoma->id_sintoma }})"
                                class="text-blue-600 hover:underline">Editar</button>
                        <button wire:click="eliminar({{ $sintoma->id_sintoma }})"
                                class="text-red-600 hover:underline"
                                onclick="return confirm('¿Seguro que deseas eliminar este síntoma?')">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">No hay síntomas registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
