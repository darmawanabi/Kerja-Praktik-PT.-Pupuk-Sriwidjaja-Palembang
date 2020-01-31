<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mail\NotifResetPassword;

class PasswordController extends Controller
{
    public function change(Request $request){
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        if($request->password != $request->password_confirmation){
            return redirect('/dashboard')->with('error', 'Password yang anda masukkan tidak sama.');
        }

        \App\User::where('id', $request->id)->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('/')->with('status', 'Password anda berhasil diubah, silahkan login menggunakan password baru anda');
    }

    public function reset(Request $request){
        $request->validate([
            'email' => 'required'
        ]);
        if(!User::where('email', '=', $request->email)->exists()){
            return redirect('/')->with('error', 'Email yang anda masukkan tidak terdata.');
        }

        $password = str_random(8);
        User::where('email', $request->email)->update([
            'password' => bcrypt($password)
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        \Mail::to($user->email)->send(new NotifResetPassword($password, $user->name));

        return redirect('/')->with('status', 'Password baru anda sudah dikirim ke email anda, silahkan login menggunakan password baru anda.');
    }
}
