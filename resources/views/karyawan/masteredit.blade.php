@extends('layouts/master')

@section('content')
<div class="row">
    @if ($check)
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Ubah Data Kontrak
                </div>
                <div class="card-body">
                    <form action="/master" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kontrak</label>
                            <input name="jenis_kontrak" type="text" class="form-control @error('jenis_kontrak') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Kontrak"  value="{{ $masterkontrak['jenis_kontrak'] }}">
                            @error('jenis_kontrak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Ubah Data Perizinan
                </div>
                <div class="card-body">
                    <form action="/master" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Perizinan</label>
                            <input name="jenis_perizinan" type="text" class="form-control @error('jenis_perizinan') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Perizinan"  value="{{ $masterperizinan['jenis_perizinan'] }}">
                            @error('jenis_perizinan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

@stop
