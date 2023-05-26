@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Empleado</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $empleado->nombre }}</h5>
            <h5 class="card-title">{{ $empleado->apellido }}</h5>
            <p class="card-text">{{ $empleado->puesto }}</p>
            <p class="card-text">{{ $empleado->departamento }}</p>
            <p class="card-text">ID: {{ $empleado->id }}</p>
            <h2>Horarios</h2>

            <ul>
                @foreach($empleado->horarios as $horario)
                <p>{{ $horario->hora_entrada }} - {{ $horario->hora_salida }}</p>
                @endforeach
            </ul>
            <p class="card-text">Email: {{ $empleado->email }}</p>
            <!-- Agrega aquí más campos de detalles según tus necesidades -->

            <a href="{{ route('empleado.edit', $empleado->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
@endsection