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
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Perizinan
        @if(auth()->user()->role == 'access_user' || auth()->user()->role == 'admin')
            <div class="float-right">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Tambah Perizinan</button>
            </div>
        @else
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataPost" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Akun</th>
                        <th>Nama Perizinan</th>
                        <th>Jenis Perizinan</th>
                        <th>Kategori</th>
                        <th>Tanggal Upload</th>
                        <th>Tanggal Berakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Akun</th>
                        <th>Nama Perizinan</th>
                        <th>Jenis Perizinan</th>
                        <th>Kategori</th>
                        <th>Tanggal Upload</th>
                        <th>Tanggal Berakhir</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($post as $postperizinan)
                        <tr>
                            <td>{{$postperizinan->user->name}}</td>
                            <td>{{$postperizinan->nama}}</td>
                            <td>{{$postperizinan->jenis_perizinan}}</td>
                            <td>{{$postperizinan->kategori}}</td>
                            <td>{{$postperizinan->updated_at}}</td>
                            <td>{{$postperizinan->tanggal_berakhir}}</td>
                            <td>
                            <a href="/perizinan/{{ $postperizinan->id }}" class="btn btn-primary btn-sm">Detail</a>
                            <a href="/perizinan/{{ $postperizinan->uuid }}/download" class="btn btn-success btn-sm">Download</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Perizinan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/perizinan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perizinan</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-inva   lid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Perizinan" value="{{ old('nama') }}">
                        <!-- @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Perizinan</label>
                        <input name="jenis_perizinan" type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Perizinan" value="{{ old('jenis') }}">
                        <!-- @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="exampleFormControlSelect1">
                        @if (old('kategori') == "3 Bulan")
                            <option value="3 Bulan" selected>3 Bulan</option>
                        @else
                            <option value="3 Bulan">3 Bulan</option>
                        @endif
                        @if (old('kategori') == "6 Bulan")
                            <option value="6 Bulan" selected>6 Bulan</option>
                        @else
                            <option value="6 Bulan">6 Bulan</option>
                        @endif
                        @if (old('kategori') == "1 Tahun")
                            <option value="1 Tahun" selected>1 Tahun</option>
                        @else
                            <option value="1 Tahun">1 Tahun</option>
                        @endif
                        @if (old('kategori') == "2 Tahun")
                            <option value="2 Tahun" selected>2 Tahun</option>
                        @else
                            <option value="2 Tahun">2 Tahun</option>
                        @endif
                        </select>
                        <!-- @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Berakhir</label>
                        <input name="tanggal_berakhir" type="date" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{ old('keterangan') }}</textarea>
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
