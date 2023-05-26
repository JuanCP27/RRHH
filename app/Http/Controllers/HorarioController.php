<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
use App\Http\Requests\HoraEmpleadoRequest;
use Illuminate\Http\Request;


class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('horarios.create');
        //$diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
        //return view('horarios.create', compact('diasSemana'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(HoraEmpleadoRequest $request)
    {
        // Validar los datos del formulario
        $request->validated();

        // Crear un nuevo horario

        $horario = new Horario();

        $horario->dia_semana = $request->dia_semana;
        $horario->hora_entrada = $request->hora_entrada;
        $horario->hora_salida = $request->hora_salida;
        $horario->save();

        // Redireccionar a la página de detalles del horario creado
        return redirect()->route('horarios.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
        return view('horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */


    public function edit(Horario $horario)
    {
        return view('horarios.edit', compact('horario'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Horario $horario)
    {
        // Validar los datos del formulario

        // Buscar el horario a actualizar

        // Verificar si se encontró el horario

        // Actualizar los datos del horario
        $horario->dia_semana = $request->input('dia_semana');
        $horario->hora_entrada = $request->input('hora_entrada');
        $horario->hora_salida = $request->input('hora_salida');
        $horario->save();

        // Redireccionar a la página de detalles del horario actualizado
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
        //return redirect()->route('horarios.show', $horario->id)->with('success', 'Horario actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        // Buscar el horario por su ID
        $horario = Horario::findOrFail($id);

        // Eliminar el horario
        $horario->delete();

        // Redireccionar a la lista de horarios con un mensaje de éxito
        return redirect()->route('horarios.index')->with('success', 'El horario ha sido eliminado correctamente.');
    }
}
