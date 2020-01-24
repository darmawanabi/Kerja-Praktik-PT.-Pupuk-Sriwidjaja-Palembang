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
        $masterkontrak = TableMaster::all();
        $masterperizinan = TableMasterPerizinan::all();
        return view('karyawan/tablemaster', ['masterkontrak' => $masterkontrak], ['masterperizinan' => $masterperizinan]);
    }
    public function store(Request $request)
    {
        if($request->jenis == "kontrak"){
            // insert table tablemaster
            $request->validate([
                'jenis_kontrak' => 'required|unique:table_masters'
            ]);

            TableMaster::create($request->all());

            return redirect('/master')->with('status', 'Jenis kontrak ' . $request->jenis_kontrak . ' berhasil ditambahkan.');
        } elseif ($request->jenis == "perizinan") {
            // insert table tablemasterperizinan
            $request->validate([
                'jenis_perizinan' => 'required|unique:table_master_perizinans'
            ]);

            TableMasterPerizinan::create($request->all());

            return redirect('/master')->with('status', 'Jenis perizinan ' . $request->jenis_perizinan . ' berhasil ditambahkan.');
        }
    }
    public function update(Request $request)
    {
        if($request->jenis == "kontrak"){
            // update table tablemaster
            $request->validate([
                'jenis_kontrak' => 'required|unique:table_masters'
            ]);

            $kontrak = TableMaster::find($request->id);

            if(count($kontrak->kontrak) > 0){
                return redirect('/master')->with('error', 'Jenis kontrak ' . $kontrak->jenis_kontrak . ' tidak bisa diubah, karena jenis kontrak ini sudah digunakan.');
            }

            TableMaster::where('id', $request->id)->update([
                'jenis_kontrak' => $request->jenis_kontrak
            ]);

            return redirect('/master')->with('status', 'Jenis kontrak ' . $kontrak->jenis_kontrak . ' berhasil diubah menjadi ' . $request->jenis_kontrak .'.');
        } elseif ($request->jenis == "perizinan") {
            // update table tablemasterperizinan
            $request->validate([
                'jenis_perizinan' => 'required|unique:table_master_perizinans'
            ]);

            $perizinan = TableMasterPerizinan::find($request->id);

            if(count($perizinan->perizinan) > 0){
                return redirect('/master')->with('error', 'Jenis perizinan ' . $perizinan->jenis_perizinan . ' tidak bisa diubah, karena jenis perizinan ini sudah digunakan.');
            }

            TableMasterPerizinan::where('id', $request->id)->update([
                'jenis_perizinan' => $request->jenis_perizinan
            ]);

            return redirect('/master')->with('status', 'Jenis perizinan ' . $perizinan->jenis_perizinan . ' berhasil diubah menjadi ' . $request->jenis_perizinan . '.');
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
