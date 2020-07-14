<h5>Data BAST</h5>
<button type="submit"
        class="btn btn-primary btn-icon-split center my-3"
        data-toggle="modal"
        data-target="#tambah_data_bast"
        data-backdrop="static"
        data-keyboard="false">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
</button>


<div class="modal fade" id="tambah_data_bast" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Tambah Data BAST
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.bast.create')
            </div>
        </div>
    </div>
</div>




<table class="table table-bordered table-hover display nowrap"
       cellspacing="0"
       style="width:100%">
    <thead class="thead-dark">
    <tr>
        <th>No.</th>
        <th>No. Bast</th>
        <th>No. SPH</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_bast as $bast )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $bast->no_bast }}</td>
        <td>{{ $bast->no_sph }}</td>
        <td>{{ $bast->tanggal }}</td>
        <td>
            <button class="btn btn-warning btn-icon-split"
                    data-toggle="modal"
                    data-target="#edit_data_bast{{ $bast->id }}"
                    data-backdrop="static"
                    data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Edit</span>
            </button>

            <button class="btn btn-danger btn-icon-split"
                    data-toggle="modal"
                    data-target="#confirm_delete_data_bast{{ $bast->id }}"
                    data-backdrop="static"
                    data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Hapus</span>
            </button>
        </td>
    </tr>


    <div class="modal fade" id="edit_data_bast{{ $bast->id }}" tabindex="-1" role="dialog"
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
                    @include('PSU_Perumahan.bast.edit')
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirm_delete_data_bast{{ $bast->id }}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
                </div>
                <div class="modal-body">
                    <b>Apakah Anda Akan Menghapus Data Ini ID {{$bast->id}}?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">
                        Batal
                    </button>
                    <form action="/bast/delete/{{$bast->id}}" method="post"
                          class="d-inline">
                        @method('delete')
                        <input type="hidden" name="perumahan_id"
                               value="{{$bast->perumahan_id}}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @empty
    <tr>
        <td colspan="5" class="text-center">
            <b style="color: red">
                Data Tidak Tersedia
                <br>
            </b>
        </td>
    </tr>
    @endforelse
    </tbody>
</table>
