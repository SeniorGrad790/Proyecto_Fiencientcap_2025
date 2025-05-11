@extends('layouts.app')

@section('content')
<h1>Editar Paciente</h1>
<form action="{{ route('pacientes.update', $paciente) }}" method="POST">
    @method('PUT')
    @include('pacientes.form')
</form>
@endsection
