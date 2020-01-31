<?php

namespace App\Http\Controllers;

use App\Log;
use App\Post;
use App\TableMaster;
use App\Todo;
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
    public function index($menu)
    {
        date_default_timezone_set('Asia/Bangkok');

        $contract = Post::where('jenis','kontrak')->select('id','user_id','uuid', 'table_master_id','nama','updated_at')->get();
        $table_contract = TableMaster::where('jenis','kontrak')->select('id', 'nama')->get();

        $perizinan = Post::where('jenis','perizinan')->select('id','user_id','uuid', 'table_master_id','nama','updated_at','kategori','tanggal_berakhir')->get();
        $table_perizinan = TableMaster::where('jenis','perizinan')->select('id', 'nama')->get();

        if($menu == 'contract') {
            return view('/contract/index', compact('contract','table_contract'));
        } elseif($menu == 'perizinan') {
            return view('/perizinan/index', compact('perizinan','table_perizinan'));
        } else {
            abort(404);
        }
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
    public function store($menu, Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');

        if($menu == "contract") {
            $request->validate([
                'nama'=>'required',
                'jenis_dokumen'=>'required',
                'file' => 'required|file|mimes:pdf,doc,docx,odt,txt'
            ]);
        } elseif($menu == "perizinan") {
            $request->validate([
                'nama'=>'required',
                'file' => 'required|file|mimes:pdf',
                'jenis_dokumen'=>'required',
                'kategori'=>'required',
                'tanggal_berakhir'=>'required'
            ]);
        }

        $create = $request->all();

        $create['user_id'] = auth()->user()->id;
        $create['uuid'] = Str::uuid();
        $create['table_master_id'] = $request->jenis_dokumen;

        if($request->hasFile('file')) {
            $create['file'] = $request->file->getClientOriginalName();
            $request->file->storeAs(Str::kebab($create['nama']), $create['file']);
        }

        Post::create($create);

        $post = Post::where('uuid', $create['uuid'])->firstOrFail();

        Log::create([
            'jenis' => $create['jenis'],
            'user_id' => $create['user_id'],
            'post_id' => $post['id'],
            'file' => $create['file'],
            'keterangan' => "Upload"
        ]);

        if($menu == 'contract') {
            return redirect('/contract')->with('status', 'Kontrak ' . $create['nama'] . ' berhasil ditambahkan.');
        } elseif($menu = 'perizinan') {
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
            Todo::create([
                'post_id' => $post['id'],
                'repeat' => 3,
                'when' => $reminder,
                'to' => $post->user->email
            ]);

            return redirect('/perizinan')->with('status', 'Perizinan ' . $create['nama'] . ' berhasil ditambahkan.');
        } else {
            abort(404);
        }
    }

    public function loggingDownload(Request $request) {
        date_default_timezone_set('Asia/Bangkok');

        $post = Post::where('uuid', $request->uuid)->firstOrFail();

        Log::create([
            'jenis' => $post->jenis,
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
    public function show($menu, $id)
    {
        $post = Post::find($id);

        if($menu == 'contract') {
            return view('contract.show', ['post' => $post]);
        } elseif($menu == 'perizinan') {
            return view('perizinan.show', ['post' => $post]);
        }
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
