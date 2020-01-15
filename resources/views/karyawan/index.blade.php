@extends('layouts/master')

@section('content')
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Karyawan
            <div class="float-right">
              <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModalLong">Tambah Data</button>
            </div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach($data_karyawan as $karyawan)
                  <tr>
                    <td>{{$karyawan->nama}}</td>
                    <td>{{$karyawan->jenis_kelamin}}</td>
                    <td>{{$karyawan->alamat}}</td>
                    <td>
                        <a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/karyawan/{{$karyawan->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="/karyawan" method="post">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">User ID</label>
                    <input name="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User ID"  value="{{ old('user_id') }}">
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                </div> -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleFormControlSelect1">
                    @if (old('jenis_kelamin') == "L")
                        <option value="L" selected>Laki - laki</option>
                    @else
                        <option value="L">Laki - laki</option>
                    @endif
                    @if (old('jenis_kelamin') == "P")
                        <option value="P" selected>Perempuan</option>
                    @else
                        <option value="P">Perempuan</option>
                    @endif
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Role</label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror" id="exampleFormControlSelect1">
                        <option value="std_user" @if($post->kategori == 'std_user') selected @endif>Standard User</option>
                        <option value="access_user" @if($post->kategori == 'access_user') selected @endif>Access User</option>
                        <option value="admin" @if($post->kategori == 'admin') selected @endif>Admin</option>
                        @endif
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
