<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Foto </h6>
    </div>

    <div class="card-body bg-gray-200" id="data_sarana">
        <div class="table-responsive">
            <table class="table table-bordered display table-hover nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Foto</th>
                    <th>File Foto</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-light">
                @forelse( $data_foto_pertamanan as $foto )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $foto->nama_foto }}</td>
                    <td>@include('PSU_Pertamanan.foto.foto_galery')</td>
                    <td>
                        <a href="/fototpus/{{ $foto->id }}/edit" class="btn btn-warning
                            btn-icon-split">
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
                            <span class="text">Delete</span>
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
                                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $foto->id }}?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/fototpus/delete"
                                      method="post"
                                      class="d-inline">
                                    <input type="hidden" name="filename" value="{{$foto->file_foto}}">
                                    <input type="hidden" name="permukiman_id"
                                           value="{{$foto->permukiman_id}}">
                                    <input type="hidden" name="id" value="{{$foto->id}}">

                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-ok">Delete
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

            <a href="/permukimans" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-alt-circle-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
</div>
