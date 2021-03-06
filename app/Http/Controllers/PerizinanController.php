<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Log;
use App\Perizinan;
use App\Post;
use App\Todo;
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

        $post = Post::find($request->post_id);

        $exist = Storage::disk('local')->exists(Str::kebab($post['nama']) . '/' . $request->file->getClientOriginalName());

        if($exist){
            return back()->with('error', 'The file is already exist.');
        }

        $perizinan = $request->all();

        $perizinan['user_id'] = auth()->user()->id;
        $perizinan['uuid'] = Str::uuid();

        $temp = $post;

        Post::where('id', $perizinan['post_id'])->update([
            'uuid' => $perizinan['uuid'],
            'user_id' => $perizinan['user_id'],
            'file' => $request->file->getClientOriginalName(),
            'kategori' => $perizinan['kategori'],
            'tanggal_berakhir' => $perizinan['tanggal_berakhir'],
            'keterangan' => $perizinan['keterangan']
        ]);

        Log::create([
            'jenis' => $request->jenis,
            'user_id' => $perizinan['user_id'],
            'post_id' => $perizinan['post_id'],
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

        if ($request->kategori == "3 Bulan"){
            $kategori = "-3 months";
        } elseif ($request->kategori == "6 Bulan"){
            $kategori = "-6 months";
        } elseif ($request->kategori == "1 Tahun"){
            $kategori = "-1 years";
        } elseif ($request->kategori == "2 Tahun"){
            $kategori = "-2 years";
        }

        $reminder = date("Y-m-d H:i:s", strtotime($request->tanggal_berakhir . $kategori . "-7 days"));
        Todo::where('post_id', $post['id'])->updateOrCreate(
            ['post_id' => $post['id']],
            ['repeat' => 3, 'when' => $reminder, 'to' => $post->user->email]
        );

        return back()->with('status', 'Revisi Berhasil Ditambahkan.');
    }

    public function loggingDownload(Request $request) {
        date_default_timezone_set('Asia/Bangkok');

        $perizinan = Perizinan::where('uuid', $request->uuid)->firstOrFail();

        $post = Post::where('id', $request->post_id)->firstOrFail();

        Log::create([
            'jenis' => $post->jenis,
            'user_id' => auth()->user()->id,
            'post_id' => $perizinan->post_id,
            'file' => $perizinan->file,
            'keterangan' => "Download"
        ]);

        return redirect()->action('PerizinanController@download', array('post_id' => $request->post_id, 'uuid' => $request->uuid));
    }

    public function download($post_id, $uuid) {
        date_default_timezone_set('Asia/Bangkok');

        $perizinan = Perizinan::where('uuid', $uuid)->firstOrFail();

        $post = Post::where('id', $post_id)->firstOrFail();

        $pathToFile = storage_path('app\\' . Str::kebab($post->nama) . '\\' . $perizinan->file);

        return response()->download($pathToFile);
    }
}
