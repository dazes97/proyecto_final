<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MisTareasController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('email', $id)->first();
        if (is_null($user)) return "hola";
        $user_id = $user->id;
        $my_tasks = DB::table('tasks')
            ->join('user_task','user_task.task_id','=','tasks.id')
            ->join('users','users.id','=','tasks.user_id')
            ->join('type_task','type_task.id','=','tasks.task_type_id')
            ->select('tasks.id','tasks.description','tasks.start_date','tasks.finish_date','users.name as user_name','users.lastname as user_lastname','type_task.name')
            ->where('user_task.user_id','=',$user_id)
            ->get();
        return ["1"=>$my_tasks->toJson()];
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
