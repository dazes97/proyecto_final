<?php

namespace App\Http\Controllers\Administracion;

use App\Doctor;
use App\Laboratory;
use App\Receptionist;
use App\Specialty;
use App\User;
use App\UserPreference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment\Doc;
use Symfony\Component\VarDumper\Caster\DoctrineCaster;

class UserController extends Controller
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

        $users = User::where('client_id','=',Auth()->id())->get();
        return view('administracion.usuario.index')->with(compact('users'));
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

        $specialties = Specialty::all();
        return view('administracion.usuario.create')->with(compact('specialties'));
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

        $user = new User();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('ci'));
        $user->ci = $request->input('ci');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->client_id = Auth::id();
        $user->save();
        UserPreference::create(['user_id'=>$user->id,'preference_id'=>1,'fontsize'=>15]);
        if ($request->input('role') == 1){
            $user_id = User::orderBy('created_at','desc')->first()->id;
            Doctor::create(['id' => $user_id, 'client_id' => Auth()->id()]);
            $doctor = Doctor::orderBy('created_at','desc')->first();
            $doctor->specialties()->attach($request->input('specialty'));

        }
        if ($request->input('role') == 2){
            $id = User::orderBy('created_at','desc')->first()->id;
            Receptionist::create(['id' => $id, 'client_id' => Auth()->id()]);
        }
        if ($request->input('role') == 3){
            $id = User::orderBy('created_at','desc')->first()->id;
            Laboratory::create(['id' => $id, 'client_id' => Auth()->id()]);
        }
        return redirect()->route('usuario.index');

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

        $user = User::findOrFail($id);
        $doctor = Doctor::find($user->id);
        $specialties = Specialty::all();
        return view('administracion.usuario.edit')->with(compact('user','specialties','doctor'));
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

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        if (!empty($request->input('password'))){
            $user->password = $request->input('password');
        }
        $user->ci = $request->input('ci');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->route('usuario.index');
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

        $user = User::findOrFail($id);
        if (Auth()->user()->isDoctor($user->id)){
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();
            $user->delete();
            return redirect()->route('usuario.index');
        }
        elseif (Auth()->user()->isReceptionist($user->id)){

            $receptionist = Receptionist::findOrFail($id);
            $receptionist->delete();
            $user->delete();
            return redirect()->route('usuario.index');
        }
        elseif (Auth()->user()->isLaboratory($user->id)){

            $laboratory = Laboratory::findOrFail($id);
            $laboratory->delete();
            $user->delete();
            return redirect()->route('usuario.index');
        }
    }







    /*ANDROID*/
    public function Verificar(Request $rq){
        //dd($rq);
        $a = User::all()->where('email',$rq->input('email'));
        if (count($a)>0) {
            if(Hash::check($rq->input('password'),$a->pop()->password)){
                //if($a->pop()->password == bcrypt($rq->input('password'))){
                return "success";
            }else{
                return "verificar";
            }
        }else{
            return "no existe el usuario";
        }

    }
    public function SubirToken(Request $rqt){
        $a = User::all()->where('email',$rqt->input('email'));
        if(count($a)){
            $a = $a->pop();
            $a->token_firebase = $rqt->input('token_firebase');
            $a->save();
            return "success";
        }
        return "error";
    }


}
