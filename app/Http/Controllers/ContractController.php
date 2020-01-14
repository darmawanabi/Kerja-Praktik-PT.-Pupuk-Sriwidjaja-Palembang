<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Log;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'file' => 'required|file|mimes:pdf,doc,docx,odt,txt',
            'keterangan' => 'required'
        ]);

        $post = Post::find($request->post_id);

        // $pathToFile = storage_path('app\\' . Str::kebab($post['nama']) . '\\');

        // dd($pathToFile);

        $exist = Storage::disk('local')->exists(Str::kebab($post['nama']) . '/' . $request->file->getClientOriginalName());

        // dd($exist);

        if($exist){
            return back()->with('error', 'The file is already exist.');
        }

        $contract = $request->all();

        $contract['user_id'] = auth()->user()->id;
        $contract['uuid'] = Str::uuid();

        $temp = $post;

        Post::where('id', $contract['post_id'])->update([
            'uuid' => $contract['uuid'],
            'user_id' => $contract['user_id'],
            'file' => $request->file->getClientOriginalName(),
            'keterangan' => $contract['keterangan']
        ]);

        Log::create([
            'user_id' => $contract['user_id'],
            'post_id' => $contract['post_id'],
            'file' => $request->file->getClientOriginalName(),
            'keterangan' => "Revisi"
        ]);

        $contract['uuid'] = $temp['uuid'];
        $contract['user_id'] = $temp['user_id'];
        $contract['file'] = $temp['file'];
        $contract['keterangan'] = $temp['keterangan'];
        $contract['created_at'] = $temp['updated_at'];

        if($request->hasFile('file')) {
            $request->file->storeAs(Str::kebab($post['nama']), $request->file->getClientOriginalName());
        }

        Contract::create($contract);

        return back()->with('status', 'Revisi Berhasil Ditambahkan.');
    }

    public function download($post_id, $uuid) {
        date_default_timezone_set('Asia/Bangkok');

        $contract = Contract::where('uuid', $uuid)->firstOrFail();

        $post = Post::where('id', $post_id)->firstOrFail();

        $pathToFile = storage_path('app\\' . Str::kebab($post->nama) . '\\' . $contract->file);

        Log::create([
            'user_id' => auth()->user()->id,
            'post_id' => $contract->post_id,
            'file' => $contract->file,
            'keterangan' => "Download"
        ]);
        
        return response()->download($pathToFile);

        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
