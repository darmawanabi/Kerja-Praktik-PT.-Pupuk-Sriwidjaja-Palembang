<?php

namespace App\Http\Controllers;

use App\Perizinan;
use App\PostPerizinan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        date_default_timezone_set('Asia/Bangkok');

        // $dateTemp = Perizinan::find($id);
        

        $now = now();
        $dates =  "2020-01-13 10:00:00.000000 Asia/Bangkok (+07:00)";
        $dates = substr_replace($now,"",-9);
        dd($now,$dates);

        // return view('dashboard/index');

    }
}
