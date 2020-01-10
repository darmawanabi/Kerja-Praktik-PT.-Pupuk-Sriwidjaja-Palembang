<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Daftar Revisi
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataContract" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No </th>
                        <th>Nama Akun</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No </th>
                        <th>Nama Akun</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($contracts as $contract)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contract->user->name }}</td>
                            <td>{{ $contract->created_at }}</td>
                            <td>{{ $contract->keterangan }}</td>
                            <td>
                                <a href="/contracts/{{ $post->id }}/{{ $contract->uuid }}/download" class="btn btn-success btn-sm">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
