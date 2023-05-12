@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Empleado</h1>

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control">
            </div>
 
            <div class="form-group">
                <label for="apellido">Cargo:</label>
                <input type="text" name="puesto" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellido">Area:</label>
                <input type="text" name="departamento" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
