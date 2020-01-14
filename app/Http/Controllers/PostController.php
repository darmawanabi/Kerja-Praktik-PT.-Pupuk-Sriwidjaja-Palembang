<?php

namespace App\Http\Controllers;

use App\Log;
use App\Post;
use Illuminate\Http\Request;
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
        $post = Post::all();

        return view('/contract/index', ['posts' => $post]);
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
            'file' => 'required|file|mimes:pdf,doc,docx,odt',
            'keterangan'=>'required',
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

    public function download($uuid) {
        date_default_timezone_set('Asia/Bangkok');

        $post = Post::where('uuid', $uuid)->firstOrFail();

        $pathToFile = storage_path('app/' . Str::kebab($post->nama) . '/' . $post->file);

        Log::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'file' => $post->file,
            'keterangan' => "Download"
        ]);
        
        return response()->download($pathToFile);

        // return back();
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
        return view('/contract/show', ['post' => $post]);
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
