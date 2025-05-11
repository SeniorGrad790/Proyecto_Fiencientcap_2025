@extends('layouts.app')

@section('content')
<h1>Crear Paciente</h1>
<form action="{{ route('pacientes.store') }}" method="POST">
    @include('pacientes.form')
</form>
@endsection
