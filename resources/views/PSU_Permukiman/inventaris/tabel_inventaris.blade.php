<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Inventaris</h6>
    </div>

    <div class="card-body bg-gray-200" id="data_sarana">
        <div class="table-responsive">
            <table class="table table-bordered display table-hover nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>ID Inventaris</th>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-light">
                @forelse( $data_inventaris as $inventaris )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inventaris->id }}</td>
                    <td>{{ $inventaris->nama_alat }}</td>
                    <td>{{ $inventaris->jumlah }}</td>
                    <td>{{ $inventaris->keterangan }}</td>
                    <td>
                        <a href="/inventaris/edit/{{ $inventaris->id }}" class="btn btn-warning
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
                            <span class="text">Delete</span>
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
                                <b>Apakah Anda Akan Menghapus Data Dengan ID {{ $inventaris->id
                                    }} ?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/inventaris/delete/{{ $inventaris->id }}"
                                      method="post"
                                      class="d-inline">
                                    @method('delete')
                                    <input type="hidden" name="permukiman_id"
                                           value="{{$inventaris->permukiman_id}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="6" class="text-center"><b style="color: red">
                            Data Tidak Tersedia<b></td>
                </tr>
                @endforelse
                </tbody>
            </table>

            <a href="/permukimans" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-alt-circle-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
</div>
