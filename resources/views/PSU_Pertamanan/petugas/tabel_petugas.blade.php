<div class="card-header bg-gray-500 rounded">
    <div class="row">
        <div class="col-sm-6">
            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Petugas</h6>
        </div>
    </div>
</div>
<div class="card-body bg-gray-200">
    <div class="table-responsive">
        <table class="table table-bordered display nowrap
                  table-pertamanan table-hover"
               id="dataTable"
               cellspacing="0"
               style="width:100%;">
            <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Umur</th>
                <th>Pendidikan</th>
                <th>Tugas</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody class="table-bordered bg-light">

            @forelse( $data_petugas as $petugas )

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $petugas->id }}</td>
                <td>{{ $petugas->nama }}</td>
                <td>{{ $petugas->umur }}</td>
                <td>{{ $petugas->pendidikan }}</td>
                <td>{{ $petugas->tugas }}</td>
                <td>{{ $petugas->keterangan_tugas }}</td>
                <td>
                    <a href="/petugas/edit/{{$petugas->id}}" class="btn btn-warning btn-icon-split"
                       id="add_data_petugas">
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

                    <!--     POPUP Confirm Delete-->
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
                                        {{ $petugas->id }} ?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"
                                            data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <form action="/petugas/delete/{{ $petugas->id }}"
                                          method="post"
                                          class="d-inline">
                                        @method('delete')
                                        <input type="hidden" name="pertamanan_id"
                                               value="{{$petugas->pertamanan_id}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-ok">Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr class="border">
                <td colspan="8" class="text-center">
                    <b style="color: red">Data Tidak Tersedia</b>
                </td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>




