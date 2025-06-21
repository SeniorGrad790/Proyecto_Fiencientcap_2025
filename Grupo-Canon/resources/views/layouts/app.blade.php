<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    

    <meta charset="UTF-8">
    <title>App Livewire</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    @yield('content')

    @livewireScripts
    @stack('scripts')

</body>
</html>
