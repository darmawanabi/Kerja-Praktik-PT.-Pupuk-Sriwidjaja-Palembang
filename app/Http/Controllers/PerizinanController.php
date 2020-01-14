<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\PostPerizinan;
use App\LogPerizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerizinanController extends Controller
{
    //



    public function download($uuid) {
        date_default_timezone_set('Asia/Bangkok');

        $post = PostPerizinan::where('uuid', $uuid)->firstOrFail();

        $pathToFile = storage_path('app/' . Str::kebab($post->nama) . '/' . $post->file);

        LogPerizinan::create([
            'user_id' => auth()->user()->id,
            'post_perizinan_id' => $post->id,
            'file' => $post->file,
            'keterangan' => "Download"
        ]);
        
        return response()->download($pathToFile);

        // return back();
    }
}
