@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Horario de Empleados</h1>
    <a href="{{ route('empleado.create') }}" class="btn btn-primary mb-3">Crear Empleado</a>

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $emp)
            <tr>
                <td>{{ $emp->id}}</td>
                <td>{{ $emp->nombre }}</td>
                <td>{{ $emp->apellido }}</td>
                <td>
                    <ul>
                        @php
                        $colors = ['bg-danger', 'bg-success']; // Colores alternados
                        $colorIndex = 0; // Índice del color actual
                        @endphp

                        @foreach ($emp->horarios as $horario)
                        <div class="mb-2">
                            <span class="badge {{ $colors[$colorIndex] }}"> {{ $horario->hora_entrada }}</span>
                        </div>
                        @php
                        $colorIndex = ($colorIndex + 1) % count($colors); // Actualizar el índice del color
                        @endphp

                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @php
                        $colors = ['bg-danger', 'bg-success']; // Colores alternados
                        $colorIndex = 0; // Índice del color actual
                        @endphp

                        @foreach ($emp->horarios as $horario)
                        <div class="mb-2">
                            <span class="badge {{ $colors[$colorIndex] }}"> {{ $horario->hora_salida }}</span>
                        </div>
                        @php
                        $colorIndex = ($colorIndex + 1) % count($colors); // Actualizar el índice del color
                        @endphp

                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('empleado.edit', $emp->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('empleado.show', $emp->id) }}">Ver detalles</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection