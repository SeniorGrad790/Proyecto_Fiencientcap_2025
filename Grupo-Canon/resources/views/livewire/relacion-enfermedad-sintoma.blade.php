<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 720px;">
        <div class="card-body">
            <h2 class="h4 fw-semibold mb-4">Relacionar Enfermedad con Síntomas</h2>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Cabecera: Selección de enfermedad -->
            <div class="mb-4">
                <label class="form-label">Enfermedad</label>
                <select wire:model="enfermedadSeleccionada" class="form-select">
                    <option value="">-- Selecciona una enfermedad --</option>
                    @foreach ($enfermedades as $enfermedad)
                        <option value="{{ $enfermedad->id_enfermedad }}">{{ $enfermedad->nombre }}</option>
                    @endforeach
                </select>
                <div class="mt-2">
                    <button wire:click="cargarSintomasRelacionados" class="btn btn-link btn-sm px-0">
                        Cargar síntomas
                    </button>
                </div>
            </div>

            <!-- Detalle: Síntomas relacionados -->
            @if ($enfermedadSeleccionada)
                <div class="mb-4">
                    <label class="form-label">Síntomas</label>
                    <div class="row" wire:key="detalle-{{ $enfermedadSeleccionada }}">
                        @foreach ($sintomas as $sintoma)
                            <div class="col-6">
                                <div class="form-check">
                                    <input type="checkbox"
                                           wire:model="sintomasSeleccionados"
                                           value="{{ $sintoma->id_sintoma }}"
                                           class="form-check-input"
                                           id="sintoma_{{ $sintoma->id_sintoma }}">
                                    <label class="form-check-label" for="sintoma_{{ $sintoma->id_sintoma }}">
                                        {{ $sintoma->nombre }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <button wire:click="guardarRelacion" class="btn btn-primary">
                        Guardar relación
                    </button>
                </div>
            @endif

        </div>
    </div>
</div>
