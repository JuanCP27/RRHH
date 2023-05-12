@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Horario</h1>

        <form method="POST" action="{{ route('horarios.store') }}">
            @csrf

            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="dia_semana">Día de la semana</label>
                <input type="text" name="dia_semana" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_entrada">Hora de entrada</label>
                <input type="time" name="hora_entrada" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_salida">Hora de salida</label>
                <input type="time" name="hora_salida" class="form-control" required>
            </div>

            <!-- Botón para guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
