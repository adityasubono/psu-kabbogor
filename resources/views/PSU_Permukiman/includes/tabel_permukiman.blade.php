<div class="table-responsive">
    <table class="table table-bordered display nowrap table-permukiman table-hover"
           id="dataTable"
           cellspacing="0"
           style="width:100%;">
        <thead class="thead-dark">
        <tr>
            <th rowspan="2" colspan="2">No.</th>
            <th rowspan="2">Nama TPU</th>
            <th rowspan="2">Luas TPU (m2)</th>
            <th rowspan="2">Daya Tampung TPU</th>
            <th rowspan="2" class="d-none">Status</th>
            <th colspan="2">Lokasi</th>
            <th rowspan="2">Aksi</th>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <th>Kelurahan/Desa</th>
        </tr>
        </thead>
        <tbody class="table-bordered">

        @forelse( $permukimans as $permukiman )
        <tr>
            @if($permukiman->status === 'Sudah Beroperasional')
            <td class="bg-success"></td>
            <td>{{ $loop->iteration }}</td>
            @else
            <td class="bg-danger"></td>
            <td>{{ $loop->iteration }}</td>
            @endif
            <td>@include('PSU_Permukiman.includes.menu_kelola')</td>
            <td>{{ $permukiman->luas_tpu }} m2</td>
            <td>{{ $permukiman->daya_tampung }}</td>
            <td class="d-none">{{ $permukiman->status }}</td>
            <td>{{ $permukiman->kecamatan }}</td>
            <td>{{ $permukiman->kelurahan }}</td>
            <td>
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
                <div class="modal fade"
                     id="confirm-delete-koordinat{{ $loop->iteration }}"
                     role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Dengan ID {{ $permukiman->id
                                    }} ?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/permukimans/delete/{{ $permukiman->id }}"
                                      method="post"
                                      class="d-inline">
                                    @method('delete')

                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr class="table-bordered">
            <td colspan="10" class="text-center">
                <b style="color: red">Data Tidak Tersedia</b>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>

@include('PSU_Permukiman.includes.popup_permukiman')

@include('PSU_Permukiman.includes.card_label_data')

<!--     POPUP Confirm Delete-->




