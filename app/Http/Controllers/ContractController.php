<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Post;
use Illuminate\Http\Request;
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
            'file' => 'required|file|mimes:pdf,doc,docx,odt',
            'keterangan' => 'required'
        ]);

        $contract = $request->all();

        $contract['user_id'] = auth()->user()->id;
        $contract['uuid'] = Str::uuid();

        $post = Post::find($contract['post_id']);

        $temp = $post;

        Post::where('id', $contract['post_id'])->update([
            'uuid' => $contract['uuid'],
            'user_id' => $contract['user_id'],
            'file' => $request->file->getClientOriginalName(),
            'keterangan' => $contract['keterangan']
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

        return back();
    }

    public function download($post_id, $uuid) {
        $contract = Contract::where('uuid', $uuid)->firstOrFail();

        $post = Post::find($post_id);

        $pathToFile = storage_path('app/' . Str::kebab($post['nama']) . '/' . $contract->file);

        return response()->download($pathToFile);
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
