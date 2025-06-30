<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel App') }}</title>

    {{-- Assets compilados con Vite --}}
    @vite(['resources/js/app.js'])

    @livewireStyles
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">DiagnosticApp</a>
        </div>
    </nav>

    {{-- Contenido --}}
    <main class="container">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
