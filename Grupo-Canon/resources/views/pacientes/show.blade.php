@extends('layouts.app')

@section('content')
<h1>Detalle del Paciente</h1>
<p><strong>Nombre:</strong> {{ $paciente->nombre }}</p>
<p><strong>Apellido:</strong> {{ $paciente->apellido }}</p>
<p><strong>Edad:</strong> {{ $paciente->edad }}</p>
<p><strong>Sexo:</strong> {{ $paciente->sexo }}</p>
<p><strong>Barrio:</strong> {{ $paciente->barrio }}</p>
<p><strong>Ciudad:</strong> {{ $paciente->ciudad }}</p>
<a href="{{ route('pacientes.index') }}">Volver</a>
@endsection
