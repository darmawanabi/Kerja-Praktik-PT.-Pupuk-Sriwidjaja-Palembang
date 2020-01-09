<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(Request $request){
        //insert table user
        $user = new \App\User;
        $user->id = $request->user_id;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;       
        $user->password = bcrypt('12345678');
        $user->remember_token = str_random(60);
        $user->save();       

        //email notofikasi register
        \Mail::raw('Anda Mendaftar dengan Role '.$user->role.' default password : 12345678', function ($message) use($user) {
            $message->to($user->email, $user->name);
            $message->subject('Register User - Contract Pool | Departemen Hukum PT. Pupuk Sriwidjaja Palembang');
        });

        //insert table karyawan
        $karyawan = \App\karyawan::create($request->all());
        return redirect('/');
}
}
