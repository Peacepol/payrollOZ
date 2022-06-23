<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;

class clientLoginController extends Controller
{
   
     public function index()
    {
        return view('auth.clientlogin');
    }

    function getClientCode(Request $ccode)
    {
    session()->put('tenantcode', $ccode->clientcode);
    return redirect()->route('login',$ccode->clientcode);
    }

    public function home()
    {
        return redirect(session('tenantcode').'/home');
    }

}
