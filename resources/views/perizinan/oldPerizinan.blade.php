<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        <h5 class="card-title d-inline">Daftar Revisi</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataContract" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Akun</th>
                        <th>Tanggal Upload</th>
                        <th>Tanggal Berakhir</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Nama File</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Akun</th>
                        <th>Tanggal Upload</th>
                        <th>Tanggal Berakhir</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Nama File</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($perizinan as $izin)
                        <tr>
                            <td>{{ $izin->user->name }}</td>
                            <td>{{ $izin->created_at }}</td>
                            <td>{{ $izin->tanggal_berakhir }}</td>
                            <td>{{ $izin->kategori }}</td>
                            <td>{{ $izin->keterangan }}</td>
                            <td>
                                <small id="helpId" class="text-muted">{{ $izin->file }}</small>
                            </td>
                            <td>
                                <form action="/perizinan/{{ $postperizinan->id }}" class="d-inline" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="post_id" value="{{ $postperizinan->id }}" />
                                    <input type="hidden" name="uuid" value="{{ $izin->uuid }}" />
                                    <button type="submit" class="btn btn-success btn-sm" id="btn-download">Download</button>
                                </form>
                                {{-- <a href="/perizinan/{{ $postperizinan->id }}/{{ $izin->uuid }}/download" class="btn btn-success btn-sm">Download</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
