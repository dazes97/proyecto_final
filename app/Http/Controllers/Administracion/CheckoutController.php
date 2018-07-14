<?php

namespace App\Http\Controllers\Administracion;

use App\Subscription;
use App\User;
use App\UserPreference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.Checkout.index');
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

        //TOKEN STRIPE
        $stripeToken = $request->input('stripe_token');
        $plan = 'plan_D2Mp72gKChq9Nz';
        //CREAMOS AL USUARIO PRIMERO
        $user = new User();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('ci'));
        $user->ci = $request->input('ci');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->save();
        //SACANDO DE NUEVO AL QUE INSERTAMOS PERO EL ID
        $user = User::orderBy('created_at','desc')->first();
        $user->client_id = $user->id;

        $user->save();
        //PREFERENCIA POR DEFECTO
        UserPreference::create(['user_id'=>$user->id,'preference_id'=>1,'fontsize'=>15]);
        //hacemos la suscripcion
        $user->newSubscription('main', $plan)->create($stripeToken);
        //complementamos la tabla suscripcion
        $subscription = Subscription::orderBy('created_at','desc')->first();
        $subscription->company_name = $request->input('company_name');
        $subscription->company_email = $request->input('company_email');
        $subscription->start_date = Carbon::now();
        $subscription->finish_date = Carbon::now()->addDays(30);
        $subscription->save();


        return redirect()->route('login');
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
