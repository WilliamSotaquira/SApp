<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;

class LogoutSesionController extends Controller
{
    public function EndSession()
    {
        
        Session::flush();
        Auth::logout();

        return redirect('/'); 
    }
}
