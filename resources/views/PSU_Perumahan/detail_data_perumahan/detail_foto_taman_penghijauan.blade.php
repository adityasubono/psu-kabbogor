<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Tabel Foto/Gambar Taman dan Penghijauan
    </div>
    <div class="card-body" id="data_sarana">
        <div class="row">
            @foreach( $data_taman as $taman )
            @foreach( $data_foto_taman as $fototaman )
            @if($taman->id == $fototaman->taman_id)
            <div class="col-sm-2">
                <!--Modal: Name-->
                <div class="modal fade" id="modal_foto_taman_penghijauan{{$fototaman->id}}"
                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <form action="/fotojalansalurans/update/{{$fototaman->id}}" method="post">
                                @method('patch')
                                @csrf
                                <div class="modal-body m-0 p-0">
                                    <div class="imagereview">
                                        <img
                                            src="../../assets/uploads/perumahan/taman/{{$fototaman->file_foto}}"
                                            style="width: 100%; height: 600px;">
                                        <div class="content">
                                            <h4>{{$taman->nama_taman}}</h4>
                                            <p class="text-justify">Keterangan : {{$fototaman->keterangan}}</p>
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
                        <img src="../../assets/uploads/perumahan/taman/{{$fototaman->file_foto}}"
                             style="width: 100%; height: 165px;"
                             data-toggle="modal"
                             data-target="#modal_foto_taman_penghijauan{{$fototaman->id}}"
                             data-backdrop="static"
                             data-keyboard="false">
                        <div class="content_sarana">
                            <p>{{$taman->nama_taman}}</p>
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
