<ul class="nav nav-tabs border border-0 rounded">
    <li class="nav-item dropdown border border-0 rounded">
        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" role="link">
            {{ $cctv->nama_cctv }}
        </a>
        <div class="dropdown-menu bg-gradient-warning rounded">
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#edit_data_cctv{{ $cctv->id }}"
               data-backdrop="static"
               data-keyboard="false">Edit Data CCTV
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#delete_data_cctv{{ $cctv->id }}"
               data-backdrop="static"
               data-keyboard="false">Hapus Data CCTV
            </a>
        </div>
    </li>
</ul>

<!-- Modal -->


<div class="modal fade" id="edit_data_cctv{{ $cctv->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data PJU {{$cctv->nama_pju}}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.cctv.edit')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_data_cctv{{ $cctv->id }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
            </div>
            <div class="modal-body">
                <b>Apakah Anda Akan Menghapus Data Ini ID {{$cctv->id}}?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    Batal
                </button>
                <form action="/cctvperumahans/delete/{{$cctv->id}}" method="post"
                      class="d-inline">
                    @method('delete')
                    <input type="hidden" name="perumahan_id"
                           value="{{$cctv->perumahan_id}}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

