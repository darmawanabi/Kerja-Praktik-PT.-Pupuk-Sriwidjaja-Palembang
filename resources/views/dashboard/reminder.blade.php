<div class="table-responsive">
    <table class="table table-bordered" id="dataReminder" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Akun</th>
                <th>Nama Perizinan</th>
                <th>Jenis Perizinan</th>
                <th id="kategori">Kategori</th>
                <th>Tanggal Pembaharuan</th>
                <th>Tanggal Berakhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($check as $cek)
                @php
                    $post = App\Http\Controllers\DashboardController::getPerizinan($cek['post_id']);
                    $jenis = \App\TableMaster::where('id',$post->table_master_id)->get('nama');
                    $date1 = date("d-m-Y | H:i:s", strtotime($post->updated_at));
                    $date2 = date("d-m-Y", strtotime($post->tanggal_berakhir));
                @endphp
                <tr>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->nama}}</td>
                    <td>{{$jenis[0]['nama']}}</td>
                    <td>{{$post->kategori}}</td>
                    <td>{{$date1}}</td>
                    <td>{{$date2}}</td>
                    <td style="width:13%">
                        <a href="/perizinan/{{ $post->id }}" class="btn btn-info btn-sm">Detail</a>
                    <button class="btn btn-primary btn-sm" type="button" id="btnRevisi{{$loop->iteration}}">Revisi</button>
                        {{-- <a href="/perizinan/{{ $post->id }}" class="btn btn-primary btn-sm">Revisi</a> --}}
                        {{-- <a href="/perizinan/{{ $postperizinan->uuid }}/download" class="btn btn-success btn-sm">Download</a> --}}
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal bd-example-modal-lg" id="modalRevisi{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Revisi Data Perizinan</h5>
                                <button type="button" class="close" aria-label="Close" id="modalCancel{{$loop->iteration}}">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/perizinan/{{$post->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                    <input type="hidden" name="jenis" value="perizinan" />
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Perizinan</label>
                                        <input class="form-control" type="text" value="{{ $post->nama }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Perizinan</label>
                                        <input class="form-control" type="text" value="{{ $jenis[0]['nama'] }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kategori</label>
                                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="exampleFormControlSelect1">
                                            <option value="3 Bulan" @if($post->kategori == '3 Bulan') selected @endif>3 Bulan</option>
                                            <option value="6 Bulan" @if($post->kategori == '6 Bulan') selected @endif>6 Bulan</option>
                                            <option value="1 Tahun" @if($post->kategori == '1 Tahun') selected @endif>1 Tahun</option>
                                            <option value="2 Tahun" @if($post->kategori == '2 Tahun') selected @endif>2 Tahun</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Berakhir</label>
                                        <input name="tanggal_berakhir" type="date" class="form-control @error('tanggal_berakhir') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->tanggal_berakhir}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload File</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="inputGroupFile01"
                                                    aria-describedby="inputGroupFileAddon01" name="file">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->keterangan}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="modalTutup{{$loop->iteration}}" type="button" class="btn btn-secondary">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Revisi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

