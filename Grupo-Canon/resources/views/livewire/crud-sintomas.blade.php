<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h4 mb-4 fw-semibold">Gestión de Síntomas</h2>

            @if (session()->has('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif

            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}" class="mb-4">
                <div class="mb-3">
                    <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre del síntoma">
                    @error('nombre')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ $modoEdicion ? 'Actualizar' : 'Agregar' }}
                    </button>

                    @if($modoEdicion)
                        <button type="button" wire:click="cancelar" class="btn btn-secondary">
                            Cancelar
                        </button>
                    @endif
                </div>
            </form>

            <hr class="my-4">

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                           
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sintomas as $sintoma)
                            <tr>
                                
                                <td>{{ $sintoma->nombre }}</td>
                                <td>
                                    <button wire:click="editar({{ $sintoma->id_sintoma }})" class="btn btn-sm btn-outline-primary me-2">
                                        Editar
                                    </button>
                                    <button wire:click="eliminar({{ $sintoma->id_sintoma }})"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('¿Seguro que deseas eliminar este síntoma?')">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No hay síntomas registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
