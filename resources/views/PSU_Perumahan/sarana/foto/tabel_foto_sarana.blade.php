<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Foto</h6>
    </div>

    <div class="card-body" id="data_sarana">

        <div class="row">
            @forelse( $data_foto_sarana as $fotosarana )
            <div class="col-sm-3">
                <div class="gallery">
                    <a href="../../assets/uploads/perumahan/sarana/{{$fotosarana->file_foto}}"
                       target="_blank">
                        <img src="../../assets/uploads/perumahan/sarana/{{$fotosarana->file_foto}}">
                    </a>
                    <div class="desc bg-gray-200 text-dark">{{$fotosarana->nama_foto}}</div>


                    <a href="/fotosaranas/edit/{{$fotosarana->id}}" class="btn btn-warning m-3
                     float-left">
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
                            <b>Apakah Anda Akan Menghapus Data Ini ID {{ $fotosarana->id }}?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                Cancel
                            </button>
                            <form action="/fotosaranas/delete" method="post"
                                  class="d-inline">
                                <input type="hidden" name="filename"
                                       value="{{$fotosarana->file_foto}}">
                                <input type="hidden" name="sarana_id"
                                       value="{{$fotosarana->sarana_id}}">
                                <input type="hidden" name="id"
                                       value="{{$fotosarana->id}}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-ok">Delete</button>
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

