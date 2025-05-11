@extends('layouts.app')

@section('content')
<h1>Pacientes</h1>
<a href="{{ route('pacientes.create') }}">Crear Paciente</a>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Barrio</th>
            <th>Ciudad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->nombre }}</td>
            <td>{{ $paciente->apellido }}</td>
            <td>{{ $paciente->edad }}</td>
            <td>{{ $paciente->sexo }}</td>
            <td>{{ $paciente->barrio }}</td>
            <td>{{ $paciente->ciudad }}</td>
            <td>
                <a href="{{ route('pacientes.show', $paciente) }}">Ver</a> |
                <a href="{{ route('pacientes.edit', $paciente) }}">Editar</a> |
                <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
