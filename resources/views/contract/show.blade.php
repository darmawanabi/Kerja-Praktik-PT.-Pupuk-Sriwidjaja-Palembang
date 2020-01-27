@extends('layouts/master')

@section('title', $post->nama . ' - Contract Pool | Departemen Hukum')

@section('content')
{{-- @if(auth()->user()->role == 'admin')
    <h1>Contract Pool Admin</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif

@if(auth()->user()->role == 'std_user')
    <h1>Contract Pool Standard User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif

@if(auth()->user()->role == 'access_user')
    <h1>Contract Pool Full Access User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif --}}

{{-- Form Error --}}
@if (session('error'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif
@if (session('status'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12">
            @error('file')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
        </div>
    </div>
@endif

<!-- DataTables Example -->

<div class="card mb-3">
    <div class="card-header">
        <div class="float-left">
            <a class="btn btn-danger btn-sm" href="/contract" role="button">
                &nbsp;
                <i class="fas fa-long-arrow-alt-left"></i>
                &nbsp;
            </a>
        </div>
        @if(auth()->user()->role == 'access_user' || auth()->user()->role == 'admin')
            <div class="float-right">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Tambah Revisi</button>
            </div>
        @else
        @endif
    </div>
    <div class="card-body">
        @php
            $jenis = \App\TableMaster::find($post->table_master_id);
        @endphp
        <h1 class="card-title d-inline">{{ $post->nama }}</h1>
        <h4 class="card-title">{{ $jenis->nama }}</h4>
        <p class="card-text">{{ $post->keterangan }}</p>
            <form action="/contracts/{{ $post->id }}" class="d-inline" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="uuid" value="{{ $post->uuid }}" />
                <button type="submit" class="btn btn-success btn-sm" id="btn-download">Download</button>
            </form>
            {{-- <a href="/contracts/{{ $post->uuid }}/download" class="btn btn-success btn-sm">Download</a> --}}
            <small id="helpId" class="text-muted d-inline">{{ $post->file }}</small>
    </div>
    <div class="card-footer text-muted">
        @php
            $date = date("d-m-Y | H:i:s", strtotime($post->updated_at));
        @endphp
        {{ $post->user->name }} | {{ $date }}
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        @include('contract.oldContracts', ['contracts' => $post->contracts, 'post_id' => $post->id])
    </div>
    <div class="col-md-4">
        @include('contract.logs', ['logs' => $post->logs, 'post_id' => $post->id])
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Revisi Data Kontrak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="/contract/{{ $post->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    <input type="hidden" name="jenis" value="kontrak" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kontrak</label>
                        <input class="form-control" type="text" value="{{ $post->nama }}" readonly>
                    </div>
                    <div class="form-group">
                        @php
                            $jenis = \App\TableMaster::find($post->id);
                        @endphp
                        <label for="exampleInputEmail1">Jenis Kontrak</label>
                        <input class="form-control" type="text" value="{{ $jenis->nama }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Upload File</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="file">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->keterangan }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Revisi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
