<?php

namespace App\Http\Controllers;

use App\Models\RegistroAsistencia;
use Illuminate\Http\Request;

class RegistroAsistenciaController extends Controller
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
        //
        
        $registros = RegistroAsistencia::with('empleado')->get();
        return view('registroasistencia.index', compact('registros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroAsistencia  $registroAsistencia
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroAsistencia $registroAsistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroAsistencia  $registroAsistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroAsistencia $registroAsistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroAsistencia  $registroAsistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroAsistencia $registroAsistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroAsistencia  $registroAsistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroAsistencia $registroAsistencia)
    {
        //
    }
}
