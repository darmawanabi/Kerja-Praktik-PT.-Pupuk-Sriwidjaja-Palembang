<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title d-inline">Log Activity</h5>
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
                        <tr>
                            <td>
                                <strong>{{ $logs[$i]->user->name }}</strong> melakukan <strong>{{ $logs[$i]->keterangan }}</strong> terhadap file <strong>{{ $logs[$i]->file }}</strong> pada tanggal <strong>{{ $logs[$i]->created_at }}</strong>.
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
    {{-- <ul class="list-group list-group-flush">
        @for ($i = count($logs) - 1; $i >= 0; $i--)
            <li class="list-group-item">
                <strong>{{ $logs[$i]->user->name }}</strong> melakukan <strong>{{ $logs[$i]->keterangan }}</strong> terhadap file <strong>{{ $logs[$i]->file }}</strong> pada tanggal <strong>{{ $logs[$i]->created_at }}</strong>.
            </li>
        @endfor
    </ul> --}}
</div>
