<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mt-3">
    <div class="card-header text-white bg-primary">
       Tabel Data Foto Jalan Saluran
    </div>

    <div class="card-body" id="data_sarana">
        <div class="row">
            @forelse( $data_foto_jalan_saluran as $fotojalansaluran )
            <div class="col-sm-3">
                <div class="gallery">
                    <a href="../../assets/uploads/perumahan/jalansaluran/{{$fotojalansaluran
                    ->file_foto}}"
                       target="_blank">
                        <img src="../../assets/uploads/perumahan/jalansaluran/{{$fotojalansaluran->file_foto}}">
                    </a>
                    <div class="desc bg-gray-200 text-dark">{{$fotojalansaluran->nama_foto}}</div>
                    <a href="/fotojalansalurans/edit/{{$fotojalansaluran->id}}"
                       class="btn btn-warning m-3 float-left">
                        <i class="fas fa-pen"></i>
                    </a>

                    <button type="button" class="btn btn-danger m-3 float-right"
                            data-toggle="modal"
                            data-target="#confirm-delete-foto{{ $loop->iteration }}"
                            data-backdrop="static"
                            data-keyboard="false">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="modal fade" id="confirm-delete-foto{{ $loop->iteration }}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <i class="fas fa-exclamation-triangle fa-2x text-white"> Perhatian</i>
                        </div>
                        <div class="modal-body">
                            <b>Apakah Anda Akan Menghapus Data Ini ID {{ $fotojalansaluran->id }}?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                Batal
                            </button>
                            <form action="/fotojalansalurans/delete" method="post"
                                  class="d-inline">
                                <input type="hidden" name="filename"
                                       value="{{$fotojalansaluran->file_foto}}">
                                <input type="hidden" name="jalansaluran_id"
                                       value="{{$fotojalansaluran->jalansaluran_id}}">
                                <input type="hidden" name="id"
                                       value="{{$fotojalansaluran->id}}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            <div class="gallery">
                <a href="">
                    <img src="../../assets/images/no_picture.jpg" width="600" height="400">
                </a>
                <div class="desc text-danger">Data Belum Tersedia</div>
            </div>
            @endforelse
        </div>
    </div>
</div>

