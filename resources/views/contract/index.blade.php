@extends('layouts/master')

@section('title', 'Contract Pool')

@section('content')
@if(auth()->user()->role == 'admin')
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
@endif
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Contract Pool
        @if(auth()->user()->role == 'access_user' || auth()->user()->role == 'admin')
            <div class="float-right">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Tambah Kontrak</button>
            </div>
        @else
        @endif
    </div>
    <div class="card-body">
        <div class="row">
            <div class="cols-sm-12 col-md-5">
                <div class="dataTables_type" id="dataPost_type">
                    <form>
                        <div class="form-group">
                            <label id="typePost" for="exampleFormControlSelect1">Pilih Jenis Kontrak yang akan ditampilkan</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataPost" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kontrak</th>
                        <th class="jenis">Jenis Kontrak</th>
                        <th>Nama Akun</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Kontrak</th>
                        <th class="jenis">Jenis Kontrak</th>
                        <th>Nama Akun</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->nama }}</td>
                            <td class="jenis">{{ $post->jenis }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>
                            <a href="/contracts/{{ $post->id }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/contracts/{{ $post->uuid }}/download" class="btn btn-success btn-sm">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kontrak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/contracts" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kontrak</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kontrak" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kontrak</label>
                        <input name="jenis" type="text" class="form-control @error('jenis') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Kontrak" value="{{ old('jenis') }}">
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
