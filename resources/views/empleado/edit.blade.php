@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>

    <form action="{{ route('empleado.update', $empleado->id) }}" method="POST">
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
        <label for="apellido">Horario:</label>

            <select class="form-control" id="" name="id" required>
                
                <option value="" selected>- Horario -</option>
                @foreach ($horarios as $hora)
                <option value="{{ $hora->id }}"> {{ $hora->nombre }} {{ $hora->hora_entrada }} to {{ $hora->hora_salida }}
                </option>
                @endforeach

            </select>
            
        </div>



        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection