@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Empleado</h1>

    <form action="{{ route('empleado.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombres:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>


        <div class="form-group">
            <label for="apellido">Cargo:</label>
            <input type="text" name="puesto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellido">Area:</label>
            <input type="text" name="departamento" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="horarios">Horarios:</label>
            <select name="horarios[]" id="horarios" multiple required>
                @foreach($horarios as $horario)
                <option value="{{ $horario->id }}">
                    {{ $horario->hora_entrada }} {{ $horario->hora_salida }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection