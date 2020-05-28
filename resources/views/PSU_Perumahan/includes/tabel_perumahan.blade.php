
<div class="table-responsive">
    <table class="table table-bordered table-striped display nowrap table-perumahan"
           id="dataTable"
           cellspacing="0"
           style="width:100%;">
        <thead class="thead-dark">
        <tr>
            <th rowspan="2" colspan="2">No.</th>
            <th rowspan="2">Nama Perumahan</th>
            <th rowspan="2">Nama Pengembang</th>
            <th rowspan="2">Luas Perumahan (m2)</th>
            <th colspan="4">Lokasi</th>
            <th rowspan="2">Aksi</th>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <th>Kelurahan/Desa</th>
            <th>RT</th>
            <th>RW</th>
        </tr>
        </thead>
        <tbody>

        <tr>
        @forelse( $perumahans as $perumahan )
        @if ($perumahan->status_perumahan === 'Sudah Serah Terima')
            <td class="bg-success"></td>
            <td>{{ $loop->iteration }}</td>
            @elseif ($perumahan->status_perumahan === 'Belum Serah Terima')
            <td class="bg-warning"></td>
            <td>{{ $loop->iteration }}</td>
            @elseif ($perumahan->status_perumahan === 'Terlantar')
            <td class="bg-danger"></td>
            <td>{{ $loop->iteration }}</td>
            @endif
            <td>@include('PSU_Perumahan.includes.menu_edit_perumahan')</td>
            <td>{{ $perumahan->nama_pengembang }}</td>
            <td>{{ $perumahan->luas_perumahan }}</td>
            <td>{{ $perumahan->kecamatan }}</td>
            <td>{{ $perumahan->kelurahan }}</td>
            <td>{{ $perumahan->RT }}</td>
            <td>{{ $perumahan->RW }}</td>
            <td>

                <button class="btn btn-danger btn-icon-split" data-toggle="modal"
                        data-target="#confirm-delete" data-backdrop="static"
                        data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                    <span class="text">Hapus</span>
                </button>

                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <i class="fas fa-exclamation-triangle fa-2x text-white"> Perhatian !</i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Ini ?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                                <form action="/perumahans/delete/{{$perumahan->id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @empty
        <tr class="border bg-gray-200">
            <td colspan="10" class="text-center">
                <b style="color: red">Data Tidak Tersedia</b>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>

<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
</script>
