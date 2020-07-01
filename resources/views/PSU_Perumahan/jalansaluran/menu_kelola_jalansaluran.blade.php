<ul class="nav nav-tabs border border-0 rounded">
    <li class="nav-item dropdown border border-0 rounded">
        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" role="link">
            {{ $jalansaluran->nama_jalan_saluran }}
        </a>
        <div class="dropdown-menu bg-gradient-warning rounded">
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#foto_jalansaluran{{ $jalansaluran->id }}"
               data-backdrop="static"
               data-keyboard="false">
                Input Data Foto Jalan Saluran
            </a>
            <a class="dropdown-item"
               href="/koordinatjalansaluran/{{ $jalansaluran->id}}">
                Input Data Koordinat Jalan Saluran
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#edit_data_jalansaluran{{ $jalansaluran->id }}"
               data-backdrop="static"
               data-keyboard="false">Edit Data Jalan Saluran
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#confirm_delete_jalansaluran{{ $jalansaluran->id}}"
               data-backdrop="static"
               data-keyboard="false">Hapus Data Jalan Saluran
            </a>
        </div>
    </li>
</ul>

<div class="modal fade" id="foto_jalansaluran{{ $jalansaluran->id }}" tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data Jalan Saluran {{ $jalansaluran->nama_jalan_saluran }}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.jalansaluran.foto.foto_jalan_saluran')
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="edit_data_jalansaluran{{ $jalansaluran->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data Jalan Saluran {{ $jalansaluran->nama_jalan_saluran }} ||
                    ID Jalan Saluran : {{$jalansaluran->id}}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.jalansaluran.edit')
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="confirm_delete_jalansaluran{{ $jalansaluran->id}}" tabindex="-1"
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
                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $jalansaluran->id }}?</b>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-success"
                        data-dismiss="modal">
                    Batal
                </button>
                <form action="/jalansalurans/delete/{{ $jalansaluran->id }}"
                      method="post"
                      class="d-inline">
                    @method('delete')
                    <input type="hidden" name="perumahan_id"
                           value="{{$jalansaluran->perumahan_id}}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

