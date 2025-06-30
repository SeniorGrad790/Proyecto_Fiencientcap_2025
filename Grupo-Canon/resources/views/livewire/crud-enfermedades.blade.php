<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h4 mb-4 fw-semibold">Gestión de Enfermedades</h2>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre de la enfermedad">
                    @error('nombre')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ $modoEdicion ? 'Actualizar' : 'Guardar' }}
                    </button>

                    @if($modoEdicion)
                        <button type="button" wire:click="limpiarCampos" class="btn btn-secondary">
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
                            
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enfermedades as $enfermedad)
                            <tr>
                                
                                <td>{{ $enfermedad->nombre }}</td>
                                <td>
                                    <button wire:click="editar({{ $enfermedad->id_enfermedad }})"
                                            class="btn btn-sm btn-outline-primary me-2">
                                        Editar
                                    </button>
                                    <button wire:click="eliminar({{ $enfermedad->id_enfermedad }})"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('¿Seguro que deseas eliminar esta enfermedad?')">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
