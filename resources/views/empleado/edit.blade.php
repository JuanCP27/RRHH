@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>

    <form method="POST" action="{{ route('empleado.update', $empleado->id) }}" >
        @csrf
        @method('PUT')
        

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $empleado->nombre }}">
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input type="text" name="apellido" class="form-control" value="{{ $empleado->apellido }}">
        </div>

        <div class="form-group">
            <label for="apellido">Cargo:</label>
            <input type="text" name="puesto" class="form-control" value="{{ $empleado->puesto }}">
        </div>
        <div class="form-group">
            <label for="apellido">Area:</label>
            <input type="text" name="departamento" class="form-control" value="{{ $empleado->departamento }}">
        </div>
        <div class="form-group">
            <label for="horarios">Horarios:</label>
            <select name="horarios[]" id="horarios" multiple required>
                @foreach($horarios as $horas)
                <option value="{{ $horas->id }}" {{ $empleado->horarios->contains($horas->id) ? 'selected' : '' }}>
                    {{ $horas->hora_entrada }}-{{ $horas->hora_salida }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection