@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Horarios</h1>
        <a class="btn btn-primary" href="{{ route('horarios.create') }}">Crear Horario</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Día de la Semana</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->id }}</td>
                        <td>{{ $horario->dia_semana }}</td>
                        <td>{{ $horario->hora_entrada }}</td>
                        <td>{{ $horario->hora_salida }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('horarios.edit', $horario->id) }}">Editar</a>
                            <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
