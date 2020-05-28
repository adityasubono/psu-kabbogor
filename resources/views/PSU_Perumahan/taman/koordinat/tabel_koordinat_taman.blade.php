<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Koordinat Taman</h6>
    </div>

    <div class="card-body" id="data_sarana">
        <div class="table-responsive">
            <table class="table table-bordered display nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>LatLong</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_koordinat_taman as $koordinat_taman )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $koordinat_taman->latitude }}</td>
                    <td>{{ $koordinat_taman->longitude }}</td>
                    <td>{{ $koordinat_taman->latlong }}</td>
                    <td>
                        <a href="/koordinattamans/edit/{{ $koordinat_taman->id }}" class="btn
                        btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>

                        <button class="btn btn-danger btn-icon-split"
                                data-toggle="modal"
                                data-target="#confirm-delete-koordinat" data-backdrop="static"
                                data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="confirm-delete-koordinat" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <i class="fas fa-exclamation-triangle fa-2x text-white"> Perhatian !</i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $koordinat_taman->id }}?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Batal
                                </button>
                                <form action="/koordinattamans/delete/{{ $koordinat_taman->id }}"
                                      method="post"
                                      class="d-inline">
                                    @method('delete')
                                    <input type="hidden" name="taman_id"
                                           value="{{$koordinat_taman->taman_id}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger
                                    btn-ok">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr class="bg-gray-200">
                    <td colspan="5" class="text-center"><b style="color: red">
                            Data Tidak Tersedia<b></td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <a href="/tamans/{{$data_taman->perumahan_id}}"
           class="btn btn-info btn-icon-split mt-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
            <span class="text">Kembali</span>
        </a>

        @if(isset($koordinat_taman))

        <a href="/koordinattamans/show/{{$data_taman->id}}"
           class="btn btn-primary btn-icon-split mt-3">
        <span class="icon text-white-50">
            <i class="fas fa-map"></i>
        </span>
            <span class="text">Lihat Peta</span>
        </a>
        @endif

    </div>
</div>




