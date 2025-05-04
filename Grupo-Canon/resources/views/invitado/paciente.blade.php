<!DOCTYPE html>
<html>
<head>
    <title>Registro Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Registro de Paciente</h2>
    <form action="{{ route('diagnostico.guardar') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label>Edad</label>
                <input type="number" name="edad" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Sexo</label>
                <select name="sexo" class="form-control">
                    <option>Masculino</option>
                    <option>Femenino</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label>Barrio</label>
                <input type="text" name="barrio" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label>Ciudad</label>
                <input type="text" name="ciudad" class="form-control">
            </div>
        </div>

        <h4 class="mt-4">Síntomas</h4>
        @foreach($sintomas as $sintoma)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sintomas[]" value="{{ $sintoma->id_sintoma }}">
                <label class="form-check-label">{{ $sintoma->nombre }}</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-4">Guardar Diagnóstico</button>
    </form>
</div>
</body>
</html>