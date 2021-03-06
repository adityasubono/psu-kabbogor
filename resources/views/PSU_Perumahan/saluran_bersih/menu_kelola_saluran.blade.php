<ul class="nav nav-tabs border border-0 rounded">
    <li class="nav-item dropdown border border-0 rounded">
        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" role="link">
            {{ $saluranbersih->nama_saluran }}
        </a>
        <div class="dropdown-menu bg-gradient-warning rounded">
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#edit_data_saluran_bersih{{ $saluranbersih->id }}"
               data-backdrop="static"
               data-keyboard="false">Edit Data Saluran Bersih
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#confirm_delete_saluranb_bersih{{$saluranbersih->id }}"
               data-backdrop="static"
               data-keyboard="false">Hapus Data Saluran Bersih
            </a>
        </div>
    </li>
</ul>

<!-- Modal -->


<div class="modal fade" id="edit_data_saluran_bersih{{ $saluranbersih->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data PJU {{$saluranbersih->nama_saluran}}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.saluran_bersih.edit')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm_delete_saluranb_bersih{{$saluranbersih->id}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <i class="fas fa-exclamation-triangle fa-2x"> Perhatian</i>
            </div>
            <div class="modal-body">
                <b>Apakah Anda Akan Menghapus Data Ini ID {{$saluranbersih->id}}?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    Batal
                </button>
                <form action="/saluranbersih/delete/{{$saluranbersih->id}}" method="post"
                      class="d-inline">
                    @method('delete')
                    <input type="hidden" name="perumahan_id"
                           value="{{$saluranbersih->perumahan_id}}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

