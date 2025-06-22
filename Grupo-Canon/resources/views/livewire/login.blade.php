@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded">
    <center><img src="{{ asset('images/logo_proyecto_2.png') }}" alt="Logo" class="w-[200px] h-[200px] object-cover rounded-lg shadow"></center>
    <h2 class="text-2xl font-bold mb-4 text-center">Iniciar Sesión</h2>

    <form wire:submit.prevent="login" class="space-y-4">
        <div>
            <label class="block text-sm">Correo electrónico</label>
            <input type="email" wire:model="email" class="w-full border rounded px-3 py-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm">Contraseña</label>
            <input type="password" wire:model="password" class="w-full border rounded px-3 py-2">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Entrar</button>
    </form>
</div>
@endsection
