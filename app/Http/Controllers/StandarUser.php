<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandarUser extends Controller
{
    //
    public function index(){
        return view('stduser/index');
    }
}
