<div class="container mt-5">
    <h2 class="mb-4">Registro de Paciente (Modo Invitado)</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="guardar">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" type="text" wire:model="nombre" class="form-control">
                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input id="apellido" type="text" wire:model="apellido" class="form-control">
                @error('apellido') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input id="edad" type="number" wire:model="edad" class="form-control">
                @error('edad') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" wire:model="sexo" class="form-select">
                    <option value="">Seleccione</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
                @error('sexo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="barrio" class="form-label">Barrio</label>
                <input id="barrio" type="text" wire:model="barrio" class="form-control">
                @error('barrio') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input id="ciudad" type="text" wire:model="ciudad" class="form-control">
                @error('ciudad') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="sintomas" class="form-label">Síntomas</label>
                <select id="sintomas" wire:model="sintomas" multiple class="form-select" size="6">
                    @foreach ($todosLosSintomas as $sintoma)
                        <option value="{{ $sintoma->id_sintoma }}">{{ $sintoma->nombre }}</option>
                    @endforeach
                </select>
                @error('sintomas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Guardar Paciente</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <button wire:click="goToLogin" class="btn btn-link">¿Tienes una cuenta? Iniciar sesión</button>
    </div>
</div>
