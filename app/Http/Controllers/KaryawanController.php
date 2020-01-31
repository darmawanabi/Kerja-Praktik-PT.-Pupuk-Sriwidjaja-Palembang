<?php

namespace App\Http\Controllers;

use App\Mail\NotifRegistrasi;
use Illuminate\Http\Request;
use App\User;

class KaryawanController extends Controller
{
    //
    public function index(){
        $karyawan = \App\User::all();
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

        $password = str_random(8);

        //insert table user
        $user = new \App\User;
        $user->id = $request->user_id;
        $user->name = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($password);
        $user->remember_token = str_random(60);
        $user->save();

        //send email registrasi
        \Mail::to($user->email)->send(new NotifRegistrasi($password));
        return redirect('/karyawan');
    }

    public function edit($id){
        $data_karyawan = \App\User::find($id);
        return view('/karyawan/edit', ['data_karyawan' => $data_karyawan]);
    }

    public function update(Request $request, $id){
        $data_karyawan = User::find($id);

        // Karyawan::where('id', $id)->update([
        //     'nama' => $request->nama,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'alamat' => $request->alamat
        // ]);

        User::where('id', $data_karyawan['id'])->update([
            'id' => $request->id,
            'name' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'role' => $request->role
        ]);
        return redirect('/karyawan');
    }

    public function delete($id)
    {
        $data_karyawan = \App\User::find($id);
        $data_karyawan->delete();
        // $data_user = \App\User::find($data_karyawan->user_id);
        // $data_user->delete();
        return redirect('/karyawan');
    }
}
