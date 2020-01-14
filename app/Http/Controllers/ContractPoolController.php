<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContractPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract = Contract::all();
        return view('contract.index', ['contracts' => $contract]);
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
        $request->validate([
            'nama' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,odt'
        ]);

        $contract = $request->all();

        $contract['uuid'] = Str::uuid();

        if($request->hasFile('file')) {
            $contract['file'] = $request->file->getClientOriginalName();
            $request->file->storeAs(Str::kebab($contract['nama']), $contract['file']);
        }

        // $nama_file = time()."_".$contract->getClientOriginalName();

        // $tujuan_upload = $request->nama;

        Contract::create($contract);

        return redirect('/contractpool');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
