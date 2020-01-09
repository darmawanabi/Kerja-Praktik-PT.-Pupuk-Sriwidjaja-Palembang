<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotifPendaftaranKaryawan;

class KaryawanController extends Controller
{
    //
    public function index(){
        $karyawan = \App\Karyawan::all();
        return view('/karyawan/index', ['data_karyawan' => $karyawan]);
    }

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

            \Mail::to($user->email)->send(new NotifPendaftaranKaryawan);

            //insert table karyawan
        $karyawan = \App\karyawan::create($request->all());
        return redirect('/karyawan');
    }

    public function edit($id){
        $data_karyawan = \App\Karyawan::find($id);
        return view('/karyawan/edit', ['data_karyawan' => $data_karyawan]);
    }

    public function update(Request $request, $id){
        $data_karyawan = \App\Karyawan::find($id);
        $data_karyawan->update($request->all());
        return redirect('/karyawan');
    }

    public function delete($id)
    {
        $data_karyawan = \App\Karyawan::find($id);
        $data_karyawan->delete();
        return redirect('/karyawan');
    }
}
