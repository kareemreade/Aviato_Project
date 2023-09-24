<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user= Auth::user()->type;
        if($user == 'admin'){
        return view('viewAdmain.index');
    }
    else  if ($user=='user') {
      return  redirect('not-allowed');

    }

}
public function not_allowed(){
    return redirect()->route('site1.home');

}
}
