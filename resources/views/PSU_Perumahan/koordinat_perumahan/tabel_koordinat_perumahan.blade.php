<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered display table-hover nowrap" id="dataTable"
               cellspacing="0"
               style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Koordinat Latitude</th>
                <th>Koordinat Longitude</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody class="bg-light">
            @forelse( $data_koordinat_perumahan as $koordinat )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $koordinat->latitude }}</td>
                <td>{{ $koordinat->longitude }}</td>
                <td>
                    <a href="/koordinatperumahans/edit/{{$koordinat->id}}"
                       class="btn btn-warning btn-icon-split">
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
                            <b>Apakah Anda Akan Menghapus Data Ini ID {{ $koordinat->id }}?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                Batal
                            </button>
                            <form action="/koordinatperumahans/delete/{{ $koordinat->id }}"
                                  method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="perumahan_id"
                                       value="{{$koordinat->perumahan_id}}">
                                <button type="submit" class="btn btn-danger
                                    btn-ok">Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="4" class="text-center"><b style="color: red">
                        Data Tidak Tersedia<b></td>
            </tr>
            @endforelse
            </tbody>
        </table>
        <a href="/perumahans" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-alt-circle-left"></i>
                </span>
            <span class="text">Kembali</span>
        </a>
    </div>
</div>
