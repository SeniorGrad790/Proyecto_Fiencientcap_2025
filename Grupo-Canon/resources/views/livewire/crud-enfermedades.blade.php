<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Gestión de Enfermedades</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Nombre</label>
            <input type="text" wire:model="nombre" class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300">
            @error('nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">
                {{ $modoEdicion ? 'Actualizar' : 'Guardar' }}
            </button>
            @if($modoEdicion)
                <button type="button" wire:click="limpiarCampos" class="bg-gray-400 text-black px-4 py-2 rounded hover:bg-gray-500">Cancelar</button>
            @endif
        </div>
    </form>
    <br>
    <hr class="my-6">

    <table class="w-full table table-striped">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="text-left px-4 py-2">ID</th>
                <th class="text-left px-4 py-2">Nombre</th>
                <th class="text-left px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enfermedades as $enfermedad)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $enfermedad->id_enfermedad }}</td>
                    <td class="px-4 py-2">{{ $enfermedad->nombre }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <button wire:click="editar({{ $enfermedad->id_enfermedad }})" class="text-yellow-600 hover:underline">Editar</button>
                        <button wire:click="eliminar({{ $enfermedad->id_enfermedad }})" class="text-red-600 hover:underline">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
