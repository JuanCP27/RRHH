@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Empleado</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $empleado->nombre }}</h5>
                <p class="card-text">ID: {{ $empleado->id }}</p>
                <p class="card-text">Email: {{ $empleado->email }}</p>
                <!-- Agrega aquí más campos de detalles según tus necesidades -->

                <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
@endsection
