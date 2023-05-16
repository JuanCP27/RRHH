@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Empleados</h1>
    <a href="{{ route('empleado.create') }}" class="btn btn-primary mb-3">Crear Empleado</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha Registro</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $emp)
            <tr>
                <td>{{ $emp->id}}</td>
                <td>{{ $emp->nombre }}</td>
                <td>{{ $emp->apellido }}</td>
                <td>{{ $emp->created_at}}</td>
                <td>

                    
                    <ul>
                        @foreach ($emp->horarios as $hora)
                        <li>{{ $hora->hora_entrada }} Hora</li>
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