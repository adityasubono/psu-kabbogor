<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mb-4">
    <div class="card-body" id="data_sarana">
        <div class="row">
            @foreach( $data_foto_sarana as $fotosarana )
            @foreach( $data_sarana as $sarana )
            @if($fotosarana->sarana_id == $sarana->id)
            <div class="col-sm-4">
                <!--Modal: Name-->
                <div class="modal fade" id="modal{{$fotosarana->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <div class="modal-body mb-0 p-0">
                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                    <img class="embed-responsive-item"
                                         src="../../assets/uploads/perumahan/sarana/{{$fotosarana->file_foto}}"
                                         style="width: 100%;">

                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <textarea class="form-control"
                                          id="keterangan"
                                          name="keterangan"
                                          rows="2"
                                          placeholder="Masukan Keterangan Gambar Disini"></textarea>
                                <a href="" class="btn btn-outline-warning btn-lg">Simpan</a>

                                <button type="button"
                                        class="btn btn-outline-info btn-lg"
                                        data-dismiss="modal">Batal
                                </button>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Name-->

                <div class="card mb-3 bg-gray-200">
                    <a><img class="img-fluid z-depth-1 d-inline"
                            src="../../assets/uploads/perumahan/sarana/{{$fotosarana->file_foto}}"
                            alt="{{$fotosarana->file_foto}}"
                            data-toggle="modal"
                            data-target="#modal{{$fotosarana->id}}"
                            data-backdrop="static"
                            data-keyboard="false"
                            style="width:100%; height: 150px; border: #738191 3px solid;
                            border-radius: 5px;">
                    </a>
                    <div class="card-body">
                        <b>{{$sarana->nama_sarana}}</b>
                        <p class="card-text">Keterangan :
                            @php
                            $p = $fotosarana->keterangan;
                            $word = mb_substr($p,0,50);
                            echo "$word";
                            @endphp
                        </p>

                        <button type="button"
                           class="btn btn-warning m-3 float-left"
                           data-toggle="modal"
                           data-target="#edit_foto_sarana{{ $fotosarana->id }}"
                           data-backdrop="static"
                           data-keyboard="false">
                            <i class="fas fa-pen"></i>
                        </button>

                        <button type="button" class="btn btn-danger m-3 float-right"
                                data-toggle="modal"
                                data-target="#confirm-delete-foto{{ $fotosarana->id }}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit_foto_sarana{{ $fotosarana->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                              Edit Foto / Gambar ID: {{ $fotosarana->id }} || ID Sarana: {{
                                $sarana->id}} ||
                                ID Perumahan: {{ $sarana->perumahan_id}}
                            </h5>
                            <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                                    aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('PSU_Perumahan.sarana.foto.edit')
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="confirm-delete-foto{{ $fotosarana->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <i class="fas fa-exclamation-triangle fa-2x text-white"> Perhatian</i>
                        </div>
                        <div class="modal-body">
                            <b>Apakah Anda Akan Menghapus Data Ini ID {{ $fotosarana->id }} ?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                Batal
                            </button>
                            <form action="/fotosaranas/delete" method="post"
                                  class="d-inline">
                                <input type="hidden" name="filename"
                                       value="{{$fotosarana->file_foto}}">
                                <input type="hidden" name="sarana_id"
                                       value="{{$sarana->sarana_id}}">
                                <input type="hidden" name="perumahan_id"
                                       value="{{$sarana->perumahan_id}}">
                                <input type="hidden" name="id"
                                       value="{{$fotosarana->id}}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                            </form>
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

