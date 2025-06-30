<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="card shadow" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo_proyecto_2.png') }}" 
                     alt="Logo" 
                     class="img-fluid rounded-circle shadow" 
                     style="width: 150px; height: 150px; object-fit: cover;">
            </div>

            <h2 class="h4 mb-4 text-center">Iniciar Sesión</h2>

            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" id="email" wire:model="email" 
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" wire:model="password" 
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>
