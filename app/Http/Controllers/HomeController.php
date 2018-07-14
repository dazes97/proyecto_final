<?php

namespace App\Http\Controllers;

use App\Content;
use App\Favorite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all()->where('client_id',Auth()->user()->client_id);
        $my_tasks = User::findOrFail(Auth()->id())->Tasks()->get();
        $favorites = Favorite::where('user_id',Auth::id())->get();
        return view('home')->with(compact('contents','my_tasks','favorites'));
    }
}
