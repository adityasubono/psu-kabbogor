<div class="table-responsive">
    <table class="table table-bordered display nowrap" id="dataTable" cellspacing="0"
           style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>ID Role</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $users as $user )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->nik }}</td>
            <td>{{ $user->role_id }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="../../assets/uploads/user/{{ $user->foto }}"
                     style="width: 65px; height:80px;">
            </td>
            <td>
                <a href="/users/edit/{{ $user->id }}" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-pen"></i>
                    </span>
                    <span class="text">Edit</span>
                </a>
                <button class="btn btn-danger btn-icon-split" data-toggle="modal"
                        data-target="#confirm-delete{{ $user->id }}" data-backdrop="static"
                        data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                    <span class="text">Hapus</span>
                </button>

                <!--Confirm Delete-->
                <div class="modal fade" id="confirm-delete{{ $user->id }}" tabindex="-1"
                     role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                Perhatian !
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Ini ?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>


                                <form action="/users/{{ $user->id }}" method="post" class="d-inline">
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
        <tr class="bg-gray-200">
            <td class="text-center" colspan="8"><b style="color: red">Data Tidak Tersedia</b></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
