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
                        <th>Keterangan</th>
                        <th>Nama File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Akun</th>
                        <th>Tanggal Upload</th>
                        <th>Keterangan</th>
                        <th>Nama File</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($contracts as $contract)
                     @php
                        $date = date("d-m-Y | H:i:s", strtotime($contract->created_at));
                     @endphp
                        <tr>
                            <td>{{ $contract->user->name }}</td>
                            <td>{{ $date }}</td>
                            <td>{{ $contract->keterangan }}</td>
                            <td>
                                <small id="helpId" class="text-muted">{{ $contract->file }}</small>
                            </td>
                            <td>
                                <form action="/contracts/{{ $post->id }}" class="d-inline" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                    <input type="hidden" name="uuid" value="{{ $contract->uuid }}" />
                                    <button type="submit" class="btn btn-success btn-sm" id="btn-download">Download</button>
                                </form>
                                {{-- <a href="/contracts/{{ $post->id }}/{{ $contract->uuid }}/download" class="btn btn-success btn-sm">Download</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
