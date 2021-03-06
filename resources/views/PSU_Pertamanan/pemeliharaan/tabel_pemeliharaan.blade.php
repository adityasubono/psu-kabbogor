<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pemeliharaan</h6>
    </div>

    <div class="card-body bg-gray-200" id="data_sarana">
        <div class="table-responsive">
            <table class="table table-bordered display table-hover nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Nama Alat</th>
                    <th>Merk / Tipe</th>
                    <th>Tahun Perolehan</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-light">
                @forelse( $data_pemeliharaan as $pemeliharaan )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemeliharaan->id }}</td>
                    <td>{{ $pemeliharaan->nama_alat }}</td>
                    <td>{{ $pemeliharaan->tipe }}</td>
                    <td>{{ $pemeliharaan->tahun_perolehan }}</td>
                    <td>{{ $pemeliharaan->kondisi }}</td>
                    <td>{{ $pemeliharaan->keterangan }}</td>
                    <td>
                        <a href="/pemeliharaans/edit/{{$pemeliharaan->id }}" class="btn btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>

                        <button class="btn btn-danger btn-icon-split"
                                data-toggle="modal"
                                data-target="#confirm-delete-koordinat{{ $loop->iteration }}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </button>
                    </td>
                </tr>

                <div class="modal fade"
                     id="confirm-delete-koordinat{{ $loop->iteration }}"
                     role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Dengan ID
                                    {{ $pemeliharaan->id }} ?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Batal
                                </button>
                                <form action="/pemeliharaans/delete/{{ $pemeliharaan->id }}"
                                      method="post"
                                      class="d-inline">
                                    @method('delete')
                                    <input type="hidden" name="pertamanan_id"
                                           value="{{$pemeliharaan->pertamanan_id}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger
                                    btn-ok">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="7" class="text-center"><b style="color: red">
                            Data Tidak Tersedia<b></td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <a href="/pertamanans" class="btn btn-primary btn-icon-split mt-3">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-alt-circle-left"></i>
                </span>
            <span class="text">Kembali</span>
        </a>
    </div>
</div>
