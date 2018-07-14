<?php

namespace App\Http\Controllers\Archivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Structure;
class ClinicHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        $patient = Patient::all()->where('client_id',Auth()->user()->client_id);
        return view('archivo.historialclinico.index',compact('patient'));
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
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        $pa = Patient::findOrFail($request['patient']);
        $str = $pa->structure;
        $file = [];
        return view('archivo.historialclinico.show',compact('pa','str','file'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        $patient = $_GET['patient'];
        $pa = Patient::findOrFail($patient);
        $st = Structure::find($id);
        $str = $st->nodoHijos;
        $file = $st->files;
        return view('archivo.historialclinico.show',compact('pa','str','file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
