<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function reset(Request $request){
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
}
