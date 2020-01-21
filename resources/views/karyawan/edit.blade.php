@extends('layouts/master')

@section('content')
<div class="panel-heading">
<h3 class="panel-title">Edit Data Siswa</h3>
</div>
    <form action="/karyawan/{{$data_karyawan->id}}/update" method="post">
    @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{$data_karyawan->nama}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
            <option value="L" @if($data_karyawan->jenis_kelamin == 'L') selected @endif>Laki - laki</option>
            <option value="P" @if($data_karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data_karyawan->alamat}}</textarea>
        </div>
        @php
            $user = \App\User::find($data_karyawan->user_id)
        @endphp
        <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
            <select name="role" class="form-control" id="exampleFormControlSelect1">
            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
            <option value="std_user" @if($user->role == 'std_user') selected @endif>Standard User</option>
            <option value="access_user" @if($user->role == 'access_user') selected @endif>Full Access User</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-danger" href="/karyawan" role="button">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
@stop
