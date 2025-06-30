<div class="login-wrapper">

    <div class="login-card text-center">
        <div class="logo-container">
            <img src="{{ asset('images/logo_proyecto.jpg') }}" 
                 alt="Logo" 
                 class="logo-img">
        </div>

        <h2 class="welcome-title">Bienvenido</h2>

        <form wire:submit.prevent="login">
            <div class="input-group">
                <input type="email" 
                       wire:model="email" 
                       class="form-control w-full border px-3 py-2 text-center"
                       placeholder="Correo electrónico">
                @error('email') 
                    <span class="text-danger small">{{ $message }}</span> 
                @enderror
            </div>

            <div class="input-group">
                <input type="password" 
                       wire:model="password" 
                       class="form-control w-full border px-3 py-2 text-center"
                       placeholder="Contraseña">
                @error('password') 
                    <span class="text-danger small">{{ $message }}</span> 
                @enderror
            </div>

            <div class="input-group">
                <button type="submit" class="btn w-100 py-2">Login</button>
            </div>
        </form>

        <div class="links mt-3">
            <a href="{{ route('password.request') }}">¿Perdiste tu contraseña?</a><br>
            <a href="{{ route('register') }}">¿No tienes Cuenta? Regístrate</a>
        </div>
    </div>

    <div class="volver-container">
        <a href="{{ url('/') }}" class="volver-link">Volver</a>
    </div>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .login-wrapper {
            background-color: #0b3c5d;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: rgb(247, 248, 243);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .logo-img {
            max-width: 150px;
        }

        .welcome-title {
            color: #000;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .input-group {
            width: 100%;
            margin-bottom: 1.5rem; /* más espacio entre cajas */
        }

        .form-control {
            text-align: center;
            border-radius: 6px; /* menos redondeadas */
        }

        .btn {
            background-color: #cceeff;
            color: #000;
            border-radius: 6px; /* menos redondeadas */
            border: none;
        }

        .links {
            text-align: center;
        }

        .links a {
            color: #000;
            font-size: 0.9rem;
        }

        .volver-container {
            margin-top: 1rem;
        }

        .volver-link {
            color: #fff;
        }
    </style>

</div>