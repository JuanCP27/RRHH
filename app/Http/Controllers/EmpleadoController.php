<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados = Empleado::with('horarios')->get();
        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horarios = Horario::all();

        return view('empleado.create', compact('horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar y guardar los datos enviados por el formulario

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'puesto' => 'required',
            'puesto' => 'required',
            'departamento' => 'required',
        ]);
        $input = $request->all();

        $empleado = new Empleado($input);
        // Asignar valores a las propiedades del modelo
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->puesto = $request->input('puesto');
        $empleado->departamento = $request->input('departamento');
        // ...
        $empleado->save();

        return redirect()->route('empleado.index')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */

    public function show(Empleado $empleado)
    {
        return view('empleado.show', compact('empleado'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */

    public function edit(Empleado $empleado)
    {
        $horarios = Horario::all();
        return view('empleado.edit', compact('empleado','horarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Empleado $empleado)
    {
        // Validar y actualizar los datos enviados por el formulario
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->puesto = $request->input('puesto');
        $empleado->departamento = $request->input('departamento');
        // ...
        $empleado->save();

        return redirect()->route('empleado.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
