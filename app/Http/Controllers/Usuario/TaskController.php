<?php

namespace App\Http\Controllers\Usuario;

use App\Task;
use App\TypeTask;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
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

        $tasks = Task::where('user_id',Auth()->id())->get();
        $my_tasks = User::findOrFail(Auth()->id())->Tasks()->get();
        //dd($my_tasks);
        return view('usuario.Tarea.index')->with(compact('tasks','my_tasks'));
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

        $users = User::where('client_id',Auth()->user()->client_id)->where('id','<>',Auth()->id())->get();
        $type_task = TypeTask::all();
        return view('usuario.Tarea.create')->with(compact('type_task','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        Task::create($request->all());
        $user_destiny = User::findOrFail($request->input('user_destiny'));
        $task = Task::orderBy('created_at','desc')->first();
        $user_destiny->tasks()->attach($task->id);
        return redirect()->route('tareas.index');
    }
    */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

        $task = Task::findOrFail($id);
        $type_task = TypeTask::where('id','<>',$task->task_type_id)->get();
        return view('usuario.Tarea.edit')->with(compact('task','type_task'));
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

        $task = Task::findOrFail($id);
        $task->description = $request->input('description');
        $task->finish_date = $request->input('finish_date');
        $task->save();
        $task = Task::findOrFail($id);
        Auth()->user()->tasks()->updateExistingPivot($task->id,["status" => $request->input('status')]);
        return redirect()->route('tareas.index');
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




    public function store(Request $request)
    {
        //FUNCION PARA AGREGAR EL REGISTRO DE BITACORA AL TXT DE BITACORA
        Auth()->user()->registerBinnacle();
        //FUNCION PARA AGREGAR ACTIVIDADES PONER EN CADA FUNCION DEL CONTROLADOR
        Auth()->user()->setActivities();

        Task::create($request->all());
        $user_destiny = User::findOrFail($request->input('user_destiny'));
        $task = Task::orderBy('created_at','desc')->first();
        $user_destiny->tasks()->attach($task->id,['status' => 0]);
        if($user_destiny->token_firebase != null){
            $this->EnviarNotificacion($user_destiny->token_firebase,"Tiene una nueva tarea",$request->input('description'));
        }
        return redirect()->route('tareas.index');
    }

    public function EnviarNotificacion($token, $titulo,$msg){
        $url = "https://fcm.googleapis.com/fcm/send";
        $field = array(
            "to" => $token,
            "data" => array(
                'titulo' =>$titulo,
                'mensaje' => $msg,
            ),
        );
        define(
            "GOOGLE_API_KEY",
            "AAAAAuQpELo:APA91bFcPmSyjJeQlEbZoiinldhhGwWN0pn89_rPi-jeG6lsL1Q-UKHelpv7rxsAVSMgOq7AvuGwsMAvbf2WOUYzbtclACrOBcizl9ea3w7jtXby_HadK1uoym7UwPOnEDPGnubD2Sjr"
        );
        $header = array(
            'Authorization:key='.GOOGLE_API_KEY,
            'Content-Type: application/json',
        );
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($field),
            CURLOPT_HTTPHEADER => $header,
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if($err){
            return "Error: ".$err;
        }
        return $result;

    }


}
