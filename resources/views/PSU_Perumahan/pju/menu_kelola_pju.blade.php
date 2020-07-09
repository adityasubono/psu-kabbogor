<ul class="nav nav-tabs border border-0 rounded">
    <li class="nav-item dropdown border border-0 rounded">
        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" role="link">
            {{ $pju->nama_pju }}
        </a>
        <div class="dropdown-menu bg-gradient-warning rounded">
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#edit_data_pju{{ $pju->id }}"
               data-backdrop="static"
               data-keyboard="false">Edit Data PJU
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#confirm-delete-pju{{ $pju->id }}"
               data-backdrop="static"
               data-keyboard="false">Hapus Data PJU
            </a>
        </div>
    </li>
</ul>

<!-- Modal -->


<div class="modal fade" id="edit_data_pju{{ $pju->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data PJU {{$pju->nama_pju}}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.pju.edit')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete-pju{{ $pju->id }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
            </div>
            <div class="modal-body">
                <b>Apakah Anda Akan Menghapus Data Ini ID {{$pju->id}}?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    Batal
                </button>
                <form action="/pjus/delete/{{$pju->id}}" method="post"
                      class="d-inline">
                    @method('delete')
                    <input type="hidden" name="perumahan_id"
                           value="{{$pju->perumahan_id}}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

