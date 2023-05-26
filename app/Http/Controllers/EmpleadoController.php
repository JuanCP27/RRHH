<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
        //$employees = Employee::with('horarios')->get();

        //return view('employees.index')->with('employees', $employees);
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
            'departamento' => 'required',
            'horarios' => 'required|array',
            'horarios.*' => 'exists:horarios,id',
        ]);

        $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'puesto' => $request->puesto,
            'departamento' => $request->departamento,
        ]);
        $empleado->horarios()->sync($request->horarios);

        // Redireccionar o realizar otras acciones después de crear el empleado


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

        //$empleado = Empleado::find($id);

        //$empleado=Empleado::all()->find($id);

        // Verificar si el empleado existe antes de pasar el objeto a la vista
        //if (!$empleado) {
        //return redirect()->route('empleado.index');
        // Manejar el caso de empleado no encontrado, redireccionar o mostrar un mensaje de error, etc.
        // }
        $horarios = Horario::all();
        return view('empleado.edit', compact('horarios', 'empleado'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'puesto' => 'required',
            'departamento' => 'required',
        ]);


        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->puesto = $request->input('puesto');
        $empleado->departamento = $request->input('departamento');
        // Actualizar otros campos según sea necesario
        $empleado->save();
        $horariosSeleccionados = $request->input('horarios', []); // Obtener los horarios seleccionados del formulario
        $empleado->horarios()->sync($horariosSeleccionados);
        return redirect()->route('empleado.index');


        

        // ...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $id)
    {
        $id->delete();

        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
