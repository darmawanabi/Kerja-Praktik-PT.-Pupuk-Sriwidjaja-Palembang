@extends('layouts/master')

@section('content')
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
            @error('jenis_kontrak')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            @error('jenis_perizinan')
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
        <div class="row">
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Table Master Kontrak
                <div class="float-right">
                  <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalKontrak">Tambah Data</button>
                  {{-- <a href="/masterIndex" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="w-75">Jenis Kontrak</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Jenis Kontrak</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($masterkontrak as $mkontrak)
                            <tr id="kontrak{{ $mkontrak->id }}">
                                <td id="jenisKontrak{{ $mkontrak->id }}">{{$mkontrak->jenis_kontrak}}</td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-warning btn-sm" id="btnEditKontrak{{ $mkontrak->id }}">Edit</button>
                                    <a href="/master/kontrak/{{ $mkontrak->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
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
                Table Master Perizinan
                <div class="float-right">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalPerizinan">Tambah Data</button>
                {{-- <a href="/masterIndex" class="btn btn-primary btn-sm">Tambah Data</a> --}}
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="w-75">Jenis Perizinan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Jenis Perizinan</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($masterperizinan as $mperizinan)
                            <tr id="perizinan{{ $mperizinan->id }}">
                                <td id="jenisPerizinan{{ $mperizinan->id }}">{{$mperizinan->jenis_perizinan}}</td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-warning btn-sm" id="btnEditPerizinan{{ $mperizinan->id }}">Edit</button>
                                    <a href="/master/perizinan/{{ $mperizinan->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modalKontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Kontrak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/master" method="post">
                            @csrf
                            <input type="hidden" name="jenis" value="kontrak" />
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kontrak</label>
                                <input name="jenis_kontrak" type="text" class="form-control @error('jenis_kontrak') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Kontrak" value="{{ old('jenis_kontrak') }}">
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

        <div class="modal fade bd-example-modal-lg" id="modalPerizinan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Perizinan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/master" method="post">
                            @csrf
                            <input type="hidden" name="jenis" value="perizinan" />
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Perizinan</label>
                                <input name="jenis_perizinan" type="text" class="form-control @error('jenis_perizinan') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Perizinan" value="{{ old('jenis_perizinan') }}">
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
