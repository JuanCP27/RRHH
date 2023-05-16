@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Horario</h1>

    <form method="POST" action="{{ route('horarios.update', $horario->id) }}">
        @csrf
        @method('PUT')

        <!-- Campos del formulario -->
        <div class="form-group">
            <label for="dia_semana">Día de la semana</label>
            <input type="text" name="dia_semana" class="form-control" value="{{ $horario->dia_semana }}" required>
        </div>

        <div class="form-group">
            <label for="hora_entrada">Hora de entrada</label>
            <input type="time" name="hora_entrada" class="form-control" value="{{ $horario->hora_entrada }}" required>
        </div>

        <div class="form-group">
            <label for="hora_salida">Hora de salida</label>
            <input type="time" name="hora_salida" class="form-control" value="{{ $horario->hora_salida }}" required>
        </div>


        <!-- Botón para actualizar -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection