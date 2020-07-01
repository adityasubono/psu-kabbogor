<ul class="nav nav-tabs border border-0 rounded">
    <li class="nav-item dropdown border border-0 rounded">
        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" role="link">
            {{ $sarana->nama_sarana }}
        </a>
        <div class="dropdown-menu bg-gradient-warning rounded">
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#foto_sarana{{ $sarana->id }}"
               data-backdrop="static"
               data-keyboard="false">
                Input Data Foto Sarana
            </a>
            <a class="dropdown-item"
               href="/koordinatsarana/{{ $sarana->id }}">Input Data Koordinat Sarana
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#edit_data_sarana{{ $sarana->id }}"
               data-backdrop="static"
               data-keyboard="false">Edit Data Sarana
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#confirm-delete-sarana{{ $sarana->id }}"
               data-backdrop="static"
               data-keyboard="false">Hapus Data Sarana
            </a>
        </div>
    </li>
</ul>

<!-- Modal -->
<div class="modal fade" id="foto_sarana{{ $sarana->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Geserlah File Gambar / Foto
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.sarana.foto.foto_sarana')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data_sarana{{ $sarana->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data Sarana {{$sarana->nama_sarana}}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.sarana.edit')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete-sarana{{ $sarana->id }}" tabindex="-1" role="dialog"
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

