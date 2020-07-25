<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Tabel Foto/Gambar Jalan Saluran Perumahan
    </div>
    <div class="card-body" id="data_sarana">
        <div class="row">
            @foreach( $data_foto_jalan_saluran as $fotojalansaluran )
            @foreach( $data_jalan_saluran as $jalansaluran )
            @if($fotojalansaluran->jalansaluran_id == $jalansaluran->id)
            <div class="col-sm-2">
                <!--Modal: Name-->
                <div class="modal fade" id="modal_foto_jalansaluran{{$fotojalansaluran->id}}"
                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <form action="/fotojalansalurans/update/{{$fotojalansaluran->id}}" method="post">
                                @method('patch')
                                @csrf
                                <div class="modal-body m-0 p-0">
                                    <div class="imagereview">
                                        <img
                                            src="../../assets/uploads/perumahan/jalansaluran/{{$fotojalansaluran->file_foto}}"
                                            style="width: 100%; height: 600px;">
                                        <div class="content">
                                            <h4>{{$jalansaluran->nama_sarana}}</h4>
                                            <p class="text-justify">Keterangan : {{$fotojalansaluran->keterangan}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer-->
                                <div class="modal-footer m-2">
                                    <button type="button" class="btn btn-outline-danger btn-lg float-right"
                                            data-dismiss="modal">Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Name-->

                <div class="card mb-3" style="border: cornsilk solid 3px;">
                    <div class="imagereview">
                        <img src="../../assets/uploads/perumahan/jalansaluran/{{$fotojalansaluran->file_foto}}"
                             style="width: 100%; height: 165px;" data-toggle="modal"
                             data-target="#modal_foto_jalansaluran{{$fotojalansaluran->id}}" data-backdrop="static"
                             data-keyboard="false">
                        <div class="content_sarana">
                            <p>{{$jalansaluran->nama_jalan_saluran}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</div>
