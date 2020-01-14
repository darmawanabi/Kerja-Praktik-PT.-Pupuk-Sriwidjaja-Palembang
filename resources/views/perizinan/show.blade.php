@extends('layouts/master')

@section('content')
@if(auth()->user()->role == 'admin')
    <h1>Perizinan Admin</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif

@if(auth()->user()->role == 'std_user')
    <h1>Perizinan Standard User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif

@if(auth()->user()->role == 'access_user')
    <h1>Perizinan Full Access User</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque reprehenderit voluptate, ratione unde cupiditate odit dolorem corrupti ullam quam aspernatur deleniti quidem minus asperiores veniam illo minima doloribus harum.</p>
@endif

<!-- DataTables Example -->
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
@elseif (session('error'))
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
            @error('keterangan')
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

<div class="card mb-3">
    <div class="card-header">
        <div class="float-left">
            <a class="btn btn-danger btn-sm" href="/perizinan" role="button">
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
        <h1 class="card-title">{{ $postperizinan->nama }}</h1>
        <p class="card-text">{{ $postperizinan->keterangan }}</p>
            <a href="/perizinan/{{ $postperizinan->uuid }}/download" class="btn btn-success btn-sm">Download</a>
            <small id="helpId" class="text-muted">{{ $postperizinan->file }}</small>
    </div>
    <div class="card-footer text-muted">
        {{ $postperizinan->user->name }} | {{ $postperizinan->updated_at }}
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        @include('perizinan.oldPerizinan', ['perizinan' => $postperizinan->perizinan, 'post_id' => $postperizinan->id])
    </div>
    <div class="col-md-4">
        @include('perizinan.logs', ['logs' => $postperizinan->logs, 'post_id' => $postperizinan->id])
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Perizinan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/perizinan/{{$postperizinan->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_perizinan_id" value="{{ $postperizinan->id }}" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perizinan</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Perizinan" value="{{$postperizinan->nama}}">
                        <!-- @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Perizinan</label>
                        <input name="jenis_perizinan" type="text" class="form-control @error('jenis_pirizinan') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Perizinan" value="{{$postperizinan->jenis_perizinan}}">
                        <!-- @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="exampleFormControlSelect1">
                        @if (old('kategori') == "3 Bulan")
                            <option value="{{$postperizinan->kategori}}" selected>3 Bulan</option>
                        @else
                            <option value="{{$postperizinan->kategori}}">3 Bulan</option>
                        @endif
                        @if (old('kategori') == "6 Bulan")
                            <option value="{{$postperizinan->kategori}}" selected>6 Bulan</option>
                        @else
                            <option value="{{$postperizinan->kategori}}">6 Bulan</option>
                        @endif
                        @if (old('kategori') == "1 Tahun")
                            <option value="{{$postperizinan->kategori}}" selected>1 Tahun</option>
                        @else
                            <option value="{{$postperizinan->kategori}}">1 Tahun</option>
                        @endif
                        @if (old('kategori') == "2 Tahun")
                            <option value="{{$postperizinan->kategori}}" selected>2 Tahun</option>
                        @else
                            <option value="{{$postperizinan->kategori}}">2 Tahun</option>
                        @endif
                        </select>
                        <!-- @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Berakhir</label>
                        <input name="tanggal_berakhir" type="date" class="form-control @error('tanggal_berakhir') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$postperizinan->tanggal_berakhir}}">
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
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <!-- @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{$postperizinan->keterangan}}</textarea>
                        <!-- @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop