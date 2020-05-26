<!--    Tabel Koordinat Sarana      -->

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Koordinat Jalan dan Saluran</h6>
    </div>

    <div class="card-body" id="data_koordinat_jalansaluran">
        <div class="table-responsive">
            <table class="table table-bordered display nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Nama Koordinat</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_koordinat_jalan_saluran as $koordinat_jalansaluran )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $koordinat_jalansaluran->nama_koordinat }}</td>
                    <td>{{ $koordinat_jalansaluran->longitude }}</td>
                    <td>{{ $koordinat_jalansaluran->latitude }}</td>
                    <td>
                        <a href="/saranas/{{ $koordinat_jalansaluran->id }}/edit"
                           class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>

                        <button class="btn btn-danger btn-icon-split"
                                data-toggle="modal"
                                data-target="#confirm-delete-koordinat"
                                data-backdrop="static"
                                data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span>
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="confirm-delete-koordinat" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                Perhatian !
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $koordinat_jalansaluran->id }}?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/koordinatsarana/delete/{{ $koordinat_jalansaluran->id }}" method="post"
                                      class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="5" class="text-center"><b style="color: red">
                            Data Tidak Tersedia<b></td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

