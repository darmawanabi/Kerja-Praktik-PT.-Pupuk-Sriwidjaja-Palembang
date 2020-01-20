<?php

namespace App\Http\Controllers;

use App\Mail\NotifRegistrasi;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    //
    public function index(){
        $karyawan = \App\Karyawan::all();
        return view('/karyawan/index', ['data_karyawan' => $karyawan]);
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|integer',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'role' => 'required'
        ]);

        //insert table user
        $user = new \App\User;
        $user->id = $request->user_id;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt('12345678');
        $user->remember_token = str_random(60);
        $user->save();

        \Mail::to($user->email)->send(new NotifRegistrasi);

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
        $data_user = \App\User::find($data_karyawan->user_id);
        $data_user->delete();
        return redirect('/karyawan');
    }
}
