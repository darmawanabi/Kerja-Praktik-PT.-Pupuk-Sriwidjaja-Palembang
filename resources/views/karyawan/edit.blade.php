@extends('layouts/master')

@section('content')
<div class="panel-heading">
<h3 class="panel-title">Edit Data Siswa</h3>
</div>
    <form action="/karyawan/{{$data_karyawan->id}}/update" method="post">
    @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">User ID</label>
            <input name="user_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{$data_karyawan->user_id}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{$data_karyawan->nama}}">
        </div>
        <!-- <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        </div> -->
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
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data_karyawan-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
@stop