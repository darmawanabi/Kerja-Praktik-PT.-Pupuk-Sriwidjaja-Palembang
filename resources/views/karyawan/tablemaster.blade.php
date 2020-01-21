@extends('layouts/master')

@section('content')
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Master Tabel Kontrak
                <div class="float-right">
                  <a href="/masterIndex" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Jenis Kontrak</th>
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
                        <tr>
                          <td>{{$mkontrak->jenis_kontrak}}</td>
                          <td>
                            <a href="/masterEdit/{{$mkontrak->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
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
                Master Tabel Perizinan
                <div class="float-right">
                <a href="/masterIndex" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Jenis Perizinan</th>
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
                        <tr>
                          <td>{{$mperizinan->jenis_perizinan}}</td>
                          <td>
                            <a href="/masterEdit/{{$mperizinan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
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
@stop
