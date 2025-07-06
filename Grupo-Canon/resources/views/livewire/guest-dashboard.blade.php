<div class="container mt-5">
    <div class="row">
        <!-- Columna izquierda: Formulario -->
        <div class="col-md-6">
            <h2 class="mb-4">Registro de Paciente</h2>

            <form wire:submit.prevent="guardar">
                <div class="row">
                    <!-- Subcolumna izquierda (documento, nombre, apellido, ciudad) -->
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="nro_documento" class="form-label">Documento C.I</label>
                            <input id="nro_documento" type="text" wire:model="nro_documento" class="form-control">
                            @error('nro_documento') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" type="text" wire:model="nombre" class="form-control">
                            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input id="apellido" type="text" wire:model="apellido" class="form-control">
                            @error('apellido') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input id="ciudad" type="text" wire:model="ciudad" class="form-control">
                            @error('ciudad') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Subcolumna derecha (edad, sexo, barrio) -->
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input id="edad" type="number" wire:model="edad" class="form-control">
                            @error('edad') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select id="sexo" wire:model="sexo" class="form-select">
                                <option value="">Seleccione</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                            @error('sexo') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="barrio" class="form-label">Barrio</label>
                            <input id="barrio" type="text" wire:model="barrio" class="form-control">
                            @error('barrio') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Síntomas</label>
                    <div class="border rounded p-2" style="max-height: 200px; overflow-y: auto;">
                        @foreach ($todosLosSintomas as $sintoma)
                            <div class="form-check">
                                <input class="form-check-input"
                                    type="checkbox"
                                    id="sintoma{{ $sintoma->id_sintoma }}"
                                    wire:model="sintomas"
                                    value="{{ $sintoma->id_sintoma }}">
                                <label class="form-check-label" for="sintoma{{ $sintoma->id_sintoma }}">
                                    {{ $sintoma->nombre }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('sintomas') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn text-white " style="background-color: #0b3c5d;">Guardar Paciente</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <button wire:click="goToLogin" class="btn text-white " style="background-color: #0b3c5d;">¿Tienes una cuenta? Iniciar sesión</button>
            </div>
        </div>

        <!-- Columna derecha: Diagnóstico -->
        <div class="col-md-6">
            @if (session()->has('success') && $mostrarDiagnostico)
                @if (session()->has('diagnostico'))
                    <div 
                        x-data="{ show: true }" 
                        x-show="show" 
                        x-transition
                        class="mt-3"
                    >
                        <h5>Diagnóstico estimado para {{ session('nombre') }} {{ session('apellido') }}</h5>
                        <ul class="list-group mb-3">
                            @foreach (session('diagnostico') as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item['enfermedad'] }}
                                    <span class="badge bg-primary rounded-pill">{{ $item['porcentaje'] }}%</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="d-grid gap-2 mb-3">
                            <button 
                                wire:click="cerrarDiagnostico"
                                class="btn btn-outline-danger"
                            >
                                Cerrar diagnóstico
                            </button>
                        </div>
                    </div>
                @endif

                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 3000)" 
                    x-show="show"
                    x-transition
                    class="alert alert-success mt-4"
                >
                    {{ session('success') }}
                </div>
            @endif
        </div>

    </div>
</div>
