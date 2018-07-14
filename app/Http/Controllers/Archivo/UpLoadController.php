<?php

namespace App\Http\Controllers\Archivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Metadata;
use App\File;
use App\StructureFile;
use App\Repository;
class UpLoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        //dd($request);
        if ($request->hasFile('file')){
            $image = $request->file('file');
            $name = date("Ymd").'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
            /*ya guarde la imagen en el directorio images*/
            $size = filesize($destinationPath.'/'.$name);
            $date = date("Y-m-d");
            $request['size'] = $size;
            $request['date'] = $date;
            $header = Metadata::create($request->all());
            $request['metadata_id'] = $header->id;
            $request['client_id'] = Auth()->user()->client_id;
            $request['uri'] = 'images/'.$name;
            $request['user_id'] = Auth()->user()->id;
            //dd($request);
            $file = File::create($request->all());
            if($request['direction'] == 1){
                if(ctype_digit($request['node'])){
                    $request['structure_id'] = $request['node'];
                }else{
                    $request['structure_id'] = null;
                }
                $request['file_id'] = $file->id;
                $request['client_id'] = Auth()->user()->client_id;
                StructureFile::create($request->all());
            }else{
                if(ctype_digit($request['node'])){
                    $rep = Repository::findOrFail($request['node']);
                    $rep->files()->attach($file->id);
                }
            }
            return back();
        }
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
