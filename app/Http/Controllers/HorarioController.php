<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
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


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'dia_semana' => 'required',
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
        ]);

        // Crear un nuevo horario
        $horario = new Horario();
        $horario->dia_semana = $request->input('dia_semana');
        $horario->hora_entrada = $request->input('hora_entrada');
        $horario->hora_salida = $request->input('hora_salida');
        $horario->save();

        // Redireccionar a la página de detalles del horario creado
        return redirect()->route('horarios.show', $horario->id_horario);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $id)
    {
        //
        $horario = Horario::findOrFail($id);
        return view('horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $horario = Horario::find($id);

        if (!$horario) {
            // Manejo del caso si no se encuentra el horario con el ID especificado
            return redirect()->route('horarios.index')->with('error', 'No se encontró el horario');
        }

        return view('horarios.edit', compact('horario'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request, Horario $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'dia_semana' => 'required',
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
        ]);

        // Buscar el horario a actualizar
        $horario = Horario::find($id);

        // Verificar si se encontró el horario
        if (!$horario) {
            return redirect()->back()->with('error', 'El horario no existe.');
        }

        // Actualizar los datos del horario
        $horario->dia_semana = $request->input('dia_semana');
        $horario->hora_entrada = $request->input('hora_entrada');
        $horario->hora_salida = $request->input('hora_salida');
        $horario->save();

        // Redireccionar a la página de detalles del horario actualizado
        return redirect()->route('horarios.show', $horario->id_horario)->with('success', 'Horario actualizado correctamente.');
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
