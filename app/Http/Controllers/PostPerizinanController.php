<?php

namespace App\Http\Controllers;

use App\Perizinan;
use App\PostPerizinan;
use App\LogPerizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostPerizinanController extends Controller
{
    //
    public function index(Request $request)
    {
        $post = PostPerizinan::all();
        $perizinan = Perizinan::all();
        $tablemasterperizinan = \App\TableMasterPerizinan::all('jenis_perizinan')->toArray();
        return view('/perizinan/index', compact('post','perizinan','tablemasterperizinan'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');

        $request->validate([
            'nama'=>'required',
            'file' => 'required|file|mimes:pdf',
            'jenis_perizinan'=>'required',
            'kategori'=>'required',
            'tanggal_berakhir'=>'required'
        ]);

        $perizinan = $request->all();

        $perizinan['user_id'] = auth()->user()->id;
        $perizinan['uuid'] = Str::uuid();

        if($request->hasFile('file')) {
            $perizinan['file'] = $request->file->getClientOriginalName();
            $request->file->storeAs(Str::kebab($perizinan['nama']), $perizinan['file']);
        }

        PostPerizinan::create($perizinan);

        $post = PostPerizinan::where('uuid', $perizinan['uuid'])->firstOrFail();

        LogPerizinan::create([
            'user_id' => $perizinan['user_id'],
            'post_perizinan_id' => $post['id'],
            'file' => $perizinan['file'],
            'keterangan' => "Upload"
        ]);

        return redirect('/perizinan')->with('status', 'Perizinan Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $postperizinan = PostPerizinan::find($id);
        return view('/perizinan/show', ['postperizinan' => $postperizinan]);
    }

    // public function download($uuid) {
    //     date_default_timezone_set('Asia/Bangkok');

    //     $post = PostPerizinan::where('uuid', $uuid)->firstOrFail();

    //     $pathToFile = storage_path('app/' . Str::kebab($post->nama) . '/' . $post->file);

    //     LogPerizinan::create([
    //         'user_id' => auth()->user()->id,
    //         'post_perizinan_id' => $post->id,
    //         'file' => $post->file,
    //         'keterangan' => "Download"
    //     ]);

    //     return response()->download($pathToFile);

    //     // return back();
    // }

    public function loggingDownload(Request $request) {
        date_default_timezone_set('Asia/Bangkok');

        $post = PostPerizinan::where('uuid', $request->uuid)->firstOrFail();

        LogPerizinan::create([
            'user_id' => auth()->user()->id,
            'post_perizinan_id' => $post->id,
            'file' => $post->file,
            'keterangan' => "Download"
        ]);

        return redirect()->action('PostPerizinanController@download', ['uuid' => $request->uuid]);
    }

    public function download($uuid) {
        date_default_timezone_set('Asia/Bangkok');

        $post = PostPerizinan::where('uuid', $uuid)->firstOrFail();

        $pathToFile = storage_path('app\\' . Str::kebab($post->nama) . '\\' . $post->file);

        return response()->download($pathToFile);
    }
}
