<div class="table-responsive">
    <table class="table table-bordered display nowrap" id="dataTable"
           cellspacing="0"
           style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $data_koordinat as $koordinat_sarana )
        <tr class="bg-light">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $koordinat_sarana->latitude }}</td>
            <td>{{ $koordinat_sarana->longitude }}</td>
            <td>
                <a href="/koordinatsarana/edit/{{ $koordinat_sarana->id }}" class="btn
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
                        <b>Apakah Anda Akan Menghapus Data Ini ID {{ $koordinat_sarana->id }}?</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                            Cancel
                        </button>
                        <form action="/koordinatsarana/delete/{{ $koordinat_sarana->id }}"
                              method="post"
                              class="d-inline">
                            @method('delete')
                            <input type="hidden" name="sarana_id"
                                   value="{{$koordinat_sarana->sarana_id}}">
                            @csrf
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
            <td colspan="5" class="text-center bg-gray-200"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>

<a href="/perumahans/edit/{{$data_sarana->perumahan_id}}"
   class="btn btn-info btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
    <span class="text">Kembali</span>
</a>
@if(isset($data_koordinat))

<a href="/koordinatsarana/show/{{$data_sarana->id}}"
   class="btn btn-primary btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-map"></i>
        </span>
    <span class="text">Lihat Peta</span>
</a>
@else

<a href="/koordinatsarana/show/"
   class="btn btn-dark btn-icon-split my-3 disabled">
        <span class="icon text-white-50">
            <i class="fas fa-map"></i>
        </span>
    <span class="text">Lihat Peta</span>
</a>
@endif
