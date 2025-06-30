<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel App') }}</title>

    {{-- Assets compilados con Vite --}}
    @vite(['resources/js/app.js'])

    @livewireStyles
</head>
<body style="margin: 0; padding: 0;">

    {{-- Contenido dinámico Livewire --}}
    {{ $slot }}

    @livewireScripts
</body>
</html>
