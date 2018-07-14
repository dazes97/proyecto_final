<?php

namespace App\Http\Controllers\Archivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Structure;
use App\StructureFile;
use App\TypeStructure;
use App\Patient;
use App\PatientStructure;
class StructureController extends Controller
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

        /*sacar los nodos padres y enviarlo para visualizarlo*/
        $str = new structure;
        $nodo = $str->root(Auth()->user()->client_id);
        $parent = null;
        $direction = 1;
        $strfile = new StructureFile;
        $file = $strfile->clientFile(Auth()->user()->client_id);
        $type = TypeStructure::all();
        $patient = Patient::all()->where('client_id',Auth()->user()->client_id);
        return view('archivo.estructura.index',compact('nodo','file','type','parent','patient','direction'));
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
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        if( ctype_digit($request['node'])){
            /* 
                tengo el id de un directorio que no desciende directamente de root
                (sino de alguno de sus hijos o descendientes de sus hijos)
                por tanto ahora este directorio se vuelve nodo padre de otro directorio
            */
            $request['parent_node'] = $request['node'];
        }
        /* 
            si no entra al if => se esta creando un nodo padre o un nodo descendiente
            directamente de root => parent_node = null
            solo queda registrarlo
        */
        $request['client_id'] = Auth()->user()->client_id;
        $structure = Structure::create($request->all());
        if($request['patient_id'] != -1){
            $request['structure_id'] = $structure->id;
            PatientStructure::create($request->all());
        }

        return back();
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

        $str = new structure;
        $nodo = $str->rootId(Auth()->user()->client_id, $id);
        $parent = $id;
        $direction = 1;
        $strFile = new StructureFile;
        $file = $strFile->clientFileNode(Auth()->user()->client_id, $id);
        $type = TypeStructure::all();
        $patient = Patient::all()->where('client_id',Auth()->user()->client_id);
        return view('archivo.estructura.index',compact('nodo','type','file','parent','patient','direction'));
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
