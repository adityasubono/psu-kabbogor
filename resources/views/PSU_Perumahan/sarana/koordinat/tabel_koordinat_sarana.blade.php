<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Koordinat Sarana</h6>
    </div>

    <div class="card-body" id="data_sarana">
        <div class="table-responsive">
            <table class="table table-bordered display nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>LatLong</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_koordinat as $koordinat_sarana )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $koordinat_sarana->longitude }}</td>
                    <td>{{ $koordinat_sarana->latitude }}</td>
                    <td>{{ $koordinat_sarana->latlong }}</td>
                    <td>
                        <a href="/saranas/{{ $koordinat_sarana->id }}/edit" class="btn btn-warning
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
                            <span class="text">Delete</span>
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
                                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $koordinat_sarana->id }}?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/koordinatsarana/delete/{{ $koordinat_sarana->id }}" method="post"
                                      class="d-inline">
                                    @method('delete')
                                    <input type="hidden" name="sarana_id"
                                           value="{{$koordinat_sarana->sarana_id}}">
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
        <a href="/saranas/{{$data_sarana->perumahan_id}}" class="btn btn-info btn-icon-split
        mt-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
            <span class="text">Kembali</span>
        </a>

        @forelse( $data_koordinat as $koordinat_sarana )

        <a href="/koordinatsarana/show/{{$data_sarana->id}}" class="btn btn-primary
        btn-icon-split
        mt-3">
        <span class="icon text-white-50">
            <i class="fas fa-map"></i>
        </span>
            <span class="text">Lihat Peta</span>
        </a>
        @empty

        <a href="/koordinatsarana/show/{{$data_sarana->id}}" class="btn btn-dark
        btn-icon-split mt-3 disabled">
        <span class="icon text-white-50">
            <i class="fas fa-map"></i>
        </span>
            <span class="text">Lihat Peta</span>
        </a>

        @endforelse


    </div>
</div>




