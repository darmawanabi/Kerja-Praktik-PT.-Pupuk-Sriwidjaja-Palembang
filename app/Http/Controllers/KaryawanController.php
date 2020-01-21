<?php

namespace App\Http\Controllers;

use App\Mail\NotifRegistrasi;
use Illuminate\Http\Request;
use App\Karyawan;
use App\User;

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

        //send email registrasi
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
        $data_karyawan = Karyawan::find($id);

        Karyawan::where('id', $id)->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat
        ]);

        User::where('id', $data_karyawan['user_id'])->update([
            'name' => $request->nama,
            'role' => $request->role
        ]);
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

    public function masterIndex(){
        return view('karyawan/masterindex');
    }

    public function master()
    {
        $masterkontrak = \App\TableMaster::all();
        $masterperizinan = \App\TableMasterPerizinan::all();
        return view('karyawan/tablemaster', ['masterkontrak' => $masterkontrak], ['masterperizinan' => $masterperizinan]);
    }

    public function masterKontrakStore(Request $request)
    {
        //insert table tablemaster
        $request->validate([
            'jenis_kontrak' => 'required|unique:table_masters'
        ]);

        $masterkontrak = \App\TableMaster::create($request->all());
        return redirect('/master')->with('status', 'Jenis Kontrak Berhasil Ditambahkan.');
    }
    public function masterPerizinanStore(Request $request)
    {
        $request->validate([
            'jenis_perizinan' => 'required|unique:table_master_perizinans'
        ]);
        //insert table tablemasterperizinan
        $masterperizinan = \App\TableMasterPerizinan::create($request->all());
        return redirect('/master')->with('status', 'Jenis Perizinan Berhasil Ditambahkan.');
    }

    public function masterEdit($check, $id){
        if ($check == "kontrak") {
            $check = true;
        }else{
            $check = false;
        }
        $masterkontrak = \App\TableMaster::find($id);
        $masterperizinan = \App\TableMasterPerizinan::find($id);
        return view('karyawan/masteredit', compact('masterkontrak', 'masterperizinan', 'check'));
    }
}
