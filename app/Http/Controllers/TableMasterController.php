<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TableMaster;
use App\TableMasterPerizinan;

class TableMasterController extends Controller
{
    public function index()
    {
        $masterkontrak = TableMaster::where('jenis', 'kontrak')->select('id','nama')->get();
        $masterperizinan = TableMaster::where('jenis', 'perizinan')->select('id','nama')->get();
        return view('karyawan/tablemaster', ['masterkontrak' => $masterkontrak], ['masterperizinan' => $masterperizinan]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:table_masters'
        ]);

        TableMaster::create($request->all());

        if($request->jenis == "kontrak"){
            return redirect('/master')->with('status', 'Jenis kontrak ' . $request->nama . ' berhasil ditambahkan.');
        } elseif ($request->jenis == "perizinan") {
            return redirect('/master')->with('status', 'Jenis perizinan ' . $request->nama . ' berhasil ditambahkan.');
        }
    }
    public function update(Request $request)
    {
        // update table tablemaster
        $request->validate([
            'nama' => 'required|unique:table_masters'
        ]);

        $table = TableMaster::find($request->id);

        if($request->jenis == "kontrak") {
            if(count($table->kontrak) > 0) {
                return redirect('/master')->with('error', 'Jenis kontrak ' . $table->nama . ' tidak bisa diubah, karena jenis kontrak ini sudah digunakan.');
            }
        } elseif($request->jenis == "perizinan") {
            if(count($table->perizinan) > 0) {
                return redirect('/master')->with('error', 'Jenis perizinan ' . $table->nama . ' tidak bisa diubah, karena jenis perizinan ini sudah digunakan.');
            }
        }

        TableMaster::where('id', $request->id)->update([
            'nama' => $request->nama
        ]);

        if($request->jenis == "kontrak") {
            return redirect('/master')->with('status', 'Jenis kontrak ' . $table->nama . ' berhasil diubah menjadi ' . $request->nama .'.');
        } elseif ($request->jenis == "perizinan") {
            return redirect('/master')->with('status', 'Jenis perizinan ' . $table->nama . ' berhasil diubah menjadi ' . $request->nama . '.');
        }
    }

    public function delete($jenis, $id)
    {
        if($jenis == "kontrak"){
            $kontrak = TableMaster::find($id);

            if(count($kontrak->kontrak) > 0){
                return redirect('/master')->with('error', 'Jenis kontrak ' . $kontrak->jenis_kontrak . ' tidak bisa dihapus, karena jenis kontrak ini sudah digunakan.');
            }

            TableMaster::destroy($id);

            return redirect('/master')->with('status', 'Jenis kontrak ' . $kontrak->jenis_kontrak . ' berhasil dihapuskan.');
        } elseif ($jenis == "perizinan") {
            $perizinan = TableMasterPerizinan::find($id);

            if(count($perizinan->perizinan) > 0){
                return redirect('/master')->with('error', 'Jenis perizinan ' . $perizinan->jenis_perizinan . ' tidak bisa dihapus, karena jenis perizinan ini sudah digunakan.');
            }

            TableMasterPerizinan::destroy($id);

            return redirect('/master')->with('status', 'Jenis perizinan ' . $perizinan->jenis_perizinan . ' berhasil dihapuskan.');
        }
    }
}
