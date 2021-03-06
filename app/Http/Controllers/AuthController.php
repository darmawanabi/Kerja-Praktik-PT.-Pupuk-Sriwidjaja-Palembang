<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return redirect('/');
    }

    public function postlogin(Request $request){
        if (Auth::attempt($request->only('id', 'password'))){
            return redirect('/dashboard');
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
