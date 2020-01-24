@php
    use App\Http\Controllers\DashboardController;
@endphp

@extends('layouts/master')

@section('title', 'Dashboard | Departemen Hukum')

@section('content')

<script src="{{ asset('js/jquery.min.js') }}"></script>

@if(auth()->user()->role == 'admin' || auth()->user()->role == 'std_user' || auth()->user()->role == 'access_user')

    {{-- Total Kontrak --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Jumlah File Kontrak dan Perizinan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Total File Kontrak</td>
                                    <td>{{ DashboardController::totalContract() }}</td>
                                </tr>
                                <tr>
                                    <td>Total File Perizinan</td>
                                    <td>{{ DashboardController::totalPerizinan() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Kontrak Berdasarkan Jenis Kontrak
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contractJenis = DashboardController::contractByJenis();
                                @endphp
                                @foreach ($contractJenis as $contract)
                                    <tr>
                                        <td>{{ $contract['jenis'] }}</td>
                                        <td>{{ $contract['total'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Perizinan Berdasarkan Jenis Perizinan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $perizinanJenis = DashboardController::perizinanByJenis();
                                @endphp
                                @foreach ($perizinanJenis as $perizinan)
                                    <tr>
                                        <td>{{ $perizinan['jenis'] }}</td>
                                        <td>{{ $perizinan['total'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Perizinan Berdasarkan Kategori Reminder
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $perizinanKategori = DashboardController::perizinanByKategori();
                                @endphp
                                @foreach ($perizinanKategori as $perizinan)
                                    <tr>
                                        <td>{{ $perizinan['kategori'] }}</td>
                                        <td>{{ $perizinan['total'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(auth()->user()->role == 'access_user')
        @if ($show_notif)
            {{ DashboardController::showNotification() }}
        @endif

        <div class="modal fade bd-example-modal-xl" id="modalReminder" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document" id="modalReminderDialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <i class="fas fa-bell"></i>&nbsp;
                            Perizinan yang harus diperbaharui
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (session('error'))
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
                        @endif
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
                                    @error('kategori')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                    @error('tanggal_berakhir')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                    @error('file')
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
                        <div style="overflow-x:auto;">
                            @include('dashboard.reminder', ['check' => $check])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@stop
