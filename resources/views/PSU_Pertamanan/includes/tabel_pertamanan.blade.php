<div class="table-responsive">
    <table class="table table-bordered display nowrap
                  table-pertamanan table-hover"
           id="dataTable"
           cellspacing="0"
           style="width:100%;">
        <thead class="thead-dark">
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">Nama Taman</th>
            <th rowspan="2">Nama Pelaksana</th>
            <th rowspan="2">Luas Taman (m2)</th>
            <th rowspan="2" class="d-none">Tahun Diangun</th>
            <th colspan="2">Jumlah</th>
            <th colspan="4">Lokasi</th>
            <th rowspan="2">Aksi</th>
        </tr>
        <tr>
            <th>Hardscape</th>
            <th>Softscape</th>
            <th>Kecamatan</th>
            <th>Kelurahan/Desa</th>
            <th>RT</th>
            <th>RW</th>
        </tr>
        </thead>
        <tbody class="table-bordered">

        @forelse( $pertamanans as $pertamanan )

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>@include('PSU_Pertamanan.includes.menu_edit_pertamanan')</td>
            <td>{{ $pertamanan->nama_pelaksana }}</td>
            <td>{{ $pertamanan->luas_taman }}</td>
            <td class="d-none">{{ $pertamanan->tahun_dibangun }}</td>
            <td>{{$pertamanan->r_hardscape->count()}}</td>
            <td>{{$pertamanan->r_softscape->count()}}</td>
            <td>{{ $pertamanan->kecamatan }}</td>
            <td>{{ $pertamanan->kelurahan }}</td>
            <td>{{ $pertamanan->RT }}</td>
            <td>{{ $pertamanan->RW }}</td>
            <td>
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

                <!--     POPUP Confirm Delete-->
                <div class="modal fade"
                     id="confirm-delete-koordinat{{ $loop->iteration }}"
                     role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Dengan ID
                                    {{ $pertamanan->id }} ?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/pertamanans/delete/{{ $pertamanan->id }}"
                                      method="post"
                                      class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger
                                    btn-ok">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr class="border">
            <td colspan="11" class="text-center">
                <b style="color: red">Data Tidak Tersedia</b>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>

@include('PSU_Pertamanan.includes.card_label_data')


