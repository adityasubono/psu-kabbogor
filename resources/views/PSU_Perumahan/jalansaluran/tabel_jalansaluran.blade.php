<!--    Tabel Data Sarana     -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Jalan dan Saluran</h6>
    </div>
    <div class="card-body" id="data_sarana">

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered display nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Nama Jalan dan Saluran</th>
                    <th>Luas Jalan dan Saluran</th>
                    <th>Kondisi Jalan dan Saluran</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_jalan_saluran as $jalansaluran )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>@include('PSU_Perumahan.jalansaluran.menu_kelola_jalansaluran')</td>
                    <td>{{ $jalansaluran->luas_jalan_saluran }}</td>
                    <td>{{ $jalansaluran->kondisi_jalan_saluran }}</td>
                    <td>
                        <a href="/jalansalurans/edit/{{$jalansaluran->id}}" class="btn
                        btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>


                        <button class="btn btn-danger btn-icon-split"
                                data-toggle="modal"
                                data-target="#confirm-delete-sarana" data-backdrop="static"
                                data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span>
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="confirm-delete-sarana" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <i class="fas fa-exclamation-triangle fa-2x text-white">
                                    Perhatian !
                                </i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $jalansaluran->id }}?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Batal
                                </button>
                                <form action="/jalansalurans/delete/{{ $jalansaluran->id }}"
                                      method="post"
                                      class="d-inline">
                                    @method('delete')
                                    <input type="hidden" name="perumahan_id"
                                           value="{{$jalansaluran->perumahan_id}}">
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
