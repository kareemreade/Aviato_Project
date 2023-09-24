<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index() {
        $users= User::all();
        return view('viewAdmain.users.AllUsers',compact('users'));
    }
    function destroy($id)
    {
        $users= User::find($id);
        $users->delete();
        return redirect()->back();
    }
}
