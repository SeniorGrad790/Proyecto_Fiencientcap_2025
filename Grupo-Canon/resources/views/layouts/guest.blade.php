<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Invitados</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- si usas Vite --}}
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans">

    <main class="min-h-screen flex items-center justify-center">
        {{ $slot }} {{-- Aquí se renderiza el componente --}}
    </main>

    @livewireScripts
</body>
</html>
