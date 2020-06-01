<hr>
<div class="table-responsive">
    <table class="table table-bordered display nowrap" id="dataTable" cellspacing="0"
           style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>ID Role</th>
            <th>Nama Role</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $rules as $rule )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $rule->id }}</td>
            <td>{{ $rule->nama_rule }}</td>
            <td>
                <a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal"
                   data-target="#confirm-edit{{ $rule->id }}" data-backdrop="static"
                   data-keyboard="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-pen"></i>
                    </span>
                    <span class="text">Edit</span>
                </a>

                <button class="btn btn-danger btn-icon-split" data-toggle="modal"
                        data-target="#confirm-delete{{ $rule->id }}" data-backdrop="static"
                        data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                    <span class="text">Hapus</span>
                </button>

                <div class="modal fade" id="confirm-edit{{ $rule->id }}" tabindex="-1"
                     role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-dark">
                                Edit Data ID Rule : {{ $rule->id }}
                            </div>
                            <form action="/rules/update/{{ $rule->id }}" method="post" class="d-inline">
                                @csrf
                                @method('patch')
                                <div class="modal-body">
                                    <label for="nama_rule">Nama Role Sebelumnya
                                        : {{$rule->nama_rule}}</label>
                                    <input type="text" class="form-control"
                                           id="nama_rule"
                                           name="nama_rule"
                                           placeholder="Masukan Nama Role Yang baru">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"
                                            data-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-ok">Edit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!--Confirm Delete-->
                <div class="modal fade" id="confirm-delete{{ $rule->id }}" tabindex="-1"
                     role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <i class="fas fa-exclamation-triangle fa-2x text-white">
                                    Perhatian !
                                </i>
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Dengan ID {{ $rule->id }} ?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/rules/delete/{{ $rule->id }}" method="post"
                                      class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-ok">Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr class="bg-gray-200">
            <td class="text-center" colspan="4"><b style="color: red">Data Tidak Tersedia</b></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
<a href="/users" class="btn btn-info btn-icon-split mt-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-alt-circle-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
