<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Tabel Sarana Perumahan
    </div>
    <div class="card-body" id="data_sarana">
        <div class="table-responsive">
            <table class="table table-bordered table-hover display nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Sarana</th>
                    <th>Luas Sarana</th>
                    <th>Kondisi Sarana</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_sarana as $sarana )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>@include('PSU_Perumahan.sarana.menu_kelola_sarana')</td>
                    <td>{{ $sarana->luas_sarana }}</td>
                    <td>{{ $sarana->kondisi_sarana }}</td>
                    <td>



                        <button class="btn btn-danger btn-icon-split"
                                data-toggle="modal"
                                data-target="#confirm-delete-sarana" data-backdrop="static"
                                data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="confirm-delete-sarana" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $sarana->id }}?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Batal
                                </button>
                                <form action="/saranas/delete/{{ $sarana->id }}" method="post"
                                      class="d-inline">
                                    @method('delete')
                                    <input type="hidden" name="perumahan_id"
                                           value="{{$sarana->perumahan_id}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger
                                    btn-ok">Hapus</button>
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
