<?php

namespace App\Http\Controllers;

use App\Log;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Bangkok');

        $post = Post::all();
        $tablemaster = \App\TableMaster::all('jenis_kontrak')->toArray();

        // $now = now();
        // $dates =  "2020-01-13 10:00:00.000000 Asia/Bangkok (+07:00)";
        // $dates = substr_replace($now,"",-9);
        // dd($now,$dates);

        return view('/contract/index', ['posts' => $post], ['tablemaster' => $tablemaster]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');

        $request->validate([
            'nama'=>'required',
            'jenis'=>'required',
            'file' => 'required|file|mimes:pdf,doc,docx,odt,txt'
        ]);

        $contract = $request->all();

        $contract['user_id'] = auth()->user()->id;
        $contract['uuid'] = Str::uuid();

        if($request->hasFile('file')) {
            $contract['file'] = $request->file->getClientOriginalName();
            $request->file->storeAs(Str::kebab($contract['nama']), $contract['file']);
        }

        Post::create($contract);

        $post = Post::where('uuid', $contract['uuid'])->firstOrFail();

        Log::create([
            'user_id' => $contract['user_id'],
            'post_id' => $post['id'],
            'file' => $contract['file'],
            'keterangan' => "Upload"
        ]);

        return redirect('/contracts');
    }

    public function loggingDownload(Request $request) {
        date_default_timezone_set('Asia/Bangkok');

        $post = Post::where('uuid', $request->uuid)->firstOrFail();

        Log::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'file' => $post->file,
            'keterangan' => "Download"
        ]);

        return redirect()->action('PostController@download', ['uuid' => $request->uuid]);
    }

    public function download($uuid) {
        date_default_timezone_set('Asia/Bangkok');

        $post = Post::where('uuid', $uuid)->firstOrFail();

        $pathToFile = storage_path('app\\' . Str::kebab($post->nama) . '\\' . $post->file);

        return response()->download($pathToFile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('contract.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
