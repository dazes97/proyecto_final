<?php

namespace App\Http\Controllers\Administracion;

use App\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();
        $specialties = Specialty::all();
        return view('administracion.especialidad.index')->with(compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();
        return view('administracion.especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();
        Specialty::create($request->all());
        return redirect()->route('especialidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        $specialty = Specialty::findOrFail($id);
        return view('administracion.especialidad.edit')->with(compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        $specialty = Specialty::find($id);
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        return redirect()->route('especialidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        $specialty = Specialty::find($id);
        $specialty->delete();
        return redirect()->route('especialidad.index');
;    }
}
