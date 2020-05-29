<hr>
<h5 class="mt-3">Data Inventaris Alat</h5>
<div class="table-responsive">
    <table class="table table-bordered display table-hover nowrap" style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>ID Inventaris</th>
            <th>Nama Alat</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
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
            <td colspan="6" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
