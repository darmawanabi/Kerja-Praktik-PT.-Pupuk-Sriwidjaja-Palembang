<div class="card mb-3">
    <div class="card-header">
        <div class="float-left">
            <h5 class="card-title d-inline">Log Activity</h5>
        </div>
        <div class="float-right">
            <button class="btn btn-logs btn-sm" type="button" data-toggle="modal" data-target="#logDetail">Detail</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataLog" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Log Activity</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = count($logs) - 1; $i >= 0; $i--)
                        @php
                            $date = date("d-m-Y", strtotime($logs[$i]->created_at));
                            $time = date("H:i:s", strtotime($logs[$i]->created_at));
                        @endphp
                        <tr>
                            <td>
                                <strong>{{ $logs[$i]->user->name }}</strong> melakukan <strong>{{ $logs[$i]->keterangan }}</strong> terhadap file <strong>{{ $logs[$i]->file }}</strong> pada tanggal <strong>{{ $date }}</strong> pukul <strong>{{ $time }} </strong>.
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal --}}

<div class="modal fade bd-example-modal-lg" id="logDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detailed Log Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="float-left">
                            <h5 class="card-title d-inline">Log Activity</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataLogDetail" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Akun</th>
                                        <th>Keterangan</th>
                                        <th>Nama File</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama Akun</th>
                                        <th>Keterangan</th>
                                        <th>Nama File</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($logs as $log)
                                    @php
                                    $date = date("d-m-Y | H:i:s", strtotime($log->created_at));
                                    @endphp
                                        <tr>
                                            <td>{{ $log->user->name }}</td>
                                            <td>{{ $log->keterangan }}</td>
                                            <td><small id="helpId" class="text-muted d-inline">{{ $log->file }}</small></td>
                                            <td>{{ $date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
