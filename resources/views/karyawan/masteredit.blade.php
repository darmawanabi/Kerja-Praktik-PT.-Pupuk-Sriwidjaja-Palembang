@extends('layouts/master')

@section('content')
<div class="row">
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Tambah Data Kontrak
                <div class="float-right">
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <tbody>
                        <tr>
                            <td>
                            <form action="#" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Kontrak</label>
                                        <input name="jenis_kontrak" type="text" class="form-control @error('jenis_kontrak') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Kontrak"  value="{{ $masterkontrak['jenis_kontrak'] }}">
                                        @error('jenis_kontrak')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Tambah Data Perizinan
                <div class="float-right">
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                            <form action="#" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Perizinan</label>
                                        <input name="jenis_perizinan" type="text" class="form-control @error('jenis_perizinan') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Perizinan"  value="{{ $masterperizinan['jenis_perizinan'] }}">
                                        @error('jenis_perizinan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          </div>
        </div>
@stop