@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registro de Asistencias</h1>
    <a class="btn btn-primary" href="">Crear Horario</a>
    <table class="table table-hover">
    <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre de Empleado</th>
                <th>Fecha</th>
                <th>Hora Marcada de Entrada</th>
                <th>Hora Marcada de Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
            <tr>
                <td>{{ $registro->id }}</td>
                <td>{{ $registro->empleado->apellido  }}</td>
                <td>{{ $registro->fecha }}</td>
                <td>{{ $registro->hora_entrada }}</td>
                <td>{{ $registro->hora_salida }}</td>
                <td>
                    <a class="btn btn-primary" href="">Editar</a>
                    <form action="" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Ver Lista</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection