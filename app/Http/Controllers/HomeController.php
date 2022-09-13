<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','email_verified', 'last_session','save_cookie']); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        if($request->cookie('origin_sesion')){
            echo "Cookie origin_sesion : ".$request->cookie('origin_sesion')." <br>";
        }

        $user = auth()->user();
        return view('home', compact('user'));
    }
    
}
