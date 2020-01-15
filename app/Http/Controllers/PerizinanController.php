<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Perizinan;
use App\PostPerizinan;
use App\LogPerizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PerizinanController extends Controller
{
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');

        $request->validate([
            'file' => 'required|file|mimes:pdf',
            'kategori' => 'required',
            'tanggal_berakhir' => 'required'
        ]);

        $post = PostPerizinan::find($request->post_perizinan_id);

        $exist = Storage::disk('local')->exists(Str::kebab($post['nama']) . '/' . $request->file->getClientOriginalName());

        if($exist){
            return back()->with('error', 'The file is already exist.');
        }

        $perizinan = $request->all();

        $perizinan['user_id'] = auth()->user()->id;
        $perizinan['uuid'] = Str::uuid();

        $temp = $post;

        PostPerizinan::where('id', $perizinan['post_perizinan_id'])->update([
            'uuid' => $perizinan['uuid'],
            'user_id' => $perizinan['user_id'],
            'file' => $request->file->getClientOriginalName(),
            'kategori' => $perizinan['kategori'],
            'tanggal_berakhir' => $perizinan['tanggal_berakhir'],
            'keterangan' => $perizinan['keterangan']
        ]);

        LogPerizinan::create([
            'user_id' => $perizinan['user_id'],
            'post_perizinan_id' => $perizinan['post_perizinan_id'],
            'file' => $request->file->getClientOriginalName(),
            'keterangan' => "Revisi"
        ]);

        $perizinan['uuid'] = $temp['uuid'];
        $perizinan['user_id'] = $temp['user_id'];
        $perizinan['file'] = $temp['file'];
        $perizinan['keterangan'] = $temp['keterangan'];
        $perizinan['created_at'] = $temp['updated_at'];

        if($request->hasFile('file')) {
            $request->file->storeAs(Str::kebab($post['nama']), $request->file->getClientOriginalName());
        }

        Perizinan::create($perizinan);

        return back()->with('status', 'Revisi Berhasil Ditambahkan.');
    }


    // public function download($post_id, $uuid) {
    //     date_default_timezone_set('Asia/Bangkok');

    //     $perizinan = Perizinan::where('uuid', $uuid)->firstOrFail();

    //     $post = PostPerizinan::where('id', $post_id)->firstOrFail();

    //     $pathToFile = storage_path('app\\' . Str::kebab($post->nama) . '\\' . $perizinan->file);

    //     LogPerizinan::create([
    //         'user_id' => auth()->user()->id,
    //         'post_perizinan_id' => $perizinan->post_perizinan_id,
    //         'file' => $perizinan->file,
    //         'keterangan' => "Download"
    //     ]);

    //     return response()->download($pathToFile);

    //     // return back();
    // }

    public function loggingDownload(Request $request) {
        date_default_timezone_set('Asia/Bangkok');

        $perizinan = Perizinan::where('uuid', $request->uuid)->firstOrFail();

        $post = PostPerizinan::where('id', $request->post_id)->firstOrFail();

        LogPerizinan::create([
            'user_id' => auth()->user()->id,
            'post_perizinan_id' => $perizinan->post_perizinan_id,
            'file' => $perizinan->file,
            'keterangan' => "Download"
        ]);

        return redirect()->action('PerizinanController@download', array('post_id' => $request->post_id, 'uuid' => $request->uuid));
    }

    public function download($post_id, $uuid) {
        date_default_timezone_set('Asia/Bangkok');

        $perizinan = Perizinan::where('uuid', $uuid)->firstOrFail();

        $post = PostPerizinan::where('id', $post_id)->firstOrFail();

        $pathToFile = storage_path('app\\' . Str::kebab($post->nama) . '\\' . $perizinan->file);

        return response()->download($pathToFile);
    }
}
