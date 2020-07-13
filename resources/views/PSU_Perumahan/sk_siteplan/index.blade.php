<h5>Data SK Siteplan </h5>
<table class="table table-bordered table-hover display nowrap"
       cellspacing="0"
       style="width:100%">
    <thead class="thead-dark">
    <tr>
        <th>No.</th>
        <th>No. SK Siteplan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_sk_siteplan as $siteplan )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $siteplan->no_sk_siteplan }}</td>
        <td>{{ $siteplan->tanggal }}</td>
        <td>
            <button class="btn btn-warning btn-icon-split"
                    data-toggle="modal"
                    data-target="#edit_data_sk_siteplan{{ $siteplan->id }}"
                    data-backdrop="static"
                    data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Edit</span>
            </button>

            <button class="btn btn-danger btn-icon-split"
                    data-toggle="modal"
                    data-target="#confirm_delete_data_sk_siteplan{{ $siteplan->id }}"
                    data-backdrop="static"
                    data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Hapus</span>
            </button>
        </td>
    </tr>

    <div class="modal fade" id="edit_data_sk_siteplan{{ $siteplan->id }}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Data Basta
                    </h5>
                    <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                            aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @include('PSU_Perumahan.sk_siteplan.edit')
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirm_delete_data_sk_siteplan{{ $siteplan->id }}" tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
                </div>
                <div class="modal-body">
                    <b>Apakah Anda Akan Menghapus Data Ini ID {{$siteplan->id}}?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">
                        Batal
                    </button>
                    <form action="/sksiteplan/delete/{{$siteplan->id}}" method="post"
                          class="d-inline">
                        @method('delete')
                        <input type="hidden" name="perumahan_id"
                               value="{{$siteplan->perumahan_id}}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
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
