<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mt-3">
    <div class="card-header bg-primary text-white">
        Tabel Foto/Gambar Taman dan Penghijauan
    </div>
    <div class="card-body" id="data_sarana">
        <div class="row">
            @foreach( $data_foto_taman as $fototaman )
            @foreach( $data_taman as $taman )
            @if( $fototaman->taman_id == $taman->id)
            <div class="col-sm-3">
                <!--Modal: Name-->
                <div class="modal fade" id="foto_taman{{$fototaman->id}}"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <form action="/fototamans/update/{{$fototaman->id}}"
                                  method="post">
                                @method('patch')
                                @csrf
                                <div class="modal-body m-0 p-0">
                                    <div class="imagereview">
                                        <img src="../../assets/uploads/perumahan/taman/{{$fototaman->file_foto}}"
                                             style="width: 100%; height: 600px;">
                                        <div class="content">
                                            <h4>{{$taman->nama_taman}}</h4>
                                            <p class="text-justify">{{$fototaman->keterangan}}</p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="perumahan_id"
                                           value="{{$fototaman->perumahan_id}}">

                                </div>

                                <!--Footer-->
                                <div class="modal-footer justify-content-center m-2">
                                         <textarea class="form-control"
                                                   id="keterangan"
                                                   name="keterangan"
                                                   rows="2"
                                                   placeholder="Masukan Keterangan Foto/Gambar Disini"></textarea>
                                    <button type="submit"
                                            class="btn btn-outline-primary btn-lg">Simpan
                                    </button>

                                    <button type="button"
                                            class="btn btn-outline-danger btn-lg"
                                            data-dismiss="modal">Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Name-->

                <div class="card mb-3 bg-gray-200" style="border: #6c757d solid 3px;">
                    <a><img class="img-fluid z-depth-1 d-inline"
                            src="../../assets/uploads/perumahan/taman/{{$fototaman->file_foto}}"
                            alt="{{$fototaman->file_foto}}"
                            data-toggle="modal"
                            data-target="#foto_taman{{$fototaman->id}}"
                            data-backdrop="static"
                            data-keyboard="false"
                            style="width:100%; height: 150px; border-bottom: whitesmoke solid 3px;">
                    </a>
                    <div class="card-body">
                        <b>{{$taman->nama_taman}}</b>
                        <p class="card-text">Keterangan :
                            @php
                            $p = $fototaman->keterangan;
                            $word = mb_substr($p,0,50);
                            echo "$word...";
                            @endphp
                        </p>

                        <button type="button"
                                class="btn btn-warning m-3 float-left"
                                data-toggle="modal"
                                data-target="#edit_foto_taman{{ $fototaman->id }}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <i class="fas fa-pen"></i>
                        </button>

                        <button type="button" class="btn btn-danger m-3 float-right"
                                data-toggle="modal"
                                data-target="#confirm-delete-foto-taman{{$fototaman->id}}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade"
                 id="edit_foto_taman{{ $fototaman->id }}"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="exampleModalScrollableTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable"
                     role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                Edit Foto / Gambar ID: {{ $fototaman->id }} || ID Taman: {{
                                $taman->id}} ||
                                ID Perumahan: {{ $taman->perumahan_id}}
                            </h5>
                            <button type="button"
                                    class="close bg-danger p-sm-4"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('PSU_Perumahan.taman.foto.edit')
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade"
                 id="confirm-delete-foto-taman{{ $fototaman->id }}"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <i class="fas fa-exclamation-triangle fa-2x text-white"> Perhatian</i>
                        </div>
                        <div class="modal-body">
                            <b>Apakah Anda Akan Menghapus Data Ini ID {{ $fototaman->id }} ?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                Batal
                            </button>
                            <form action="/fototamans/delete" method="post"
                                  class="d-inline">
                                <input type="hidden" name="filename"
                                       value="{{$fototaman->file_foto}}">
                                <input type="hidden" name="taman_id"
                                       value="{{$taman->id}}">
                                <input type="hidden" name="perumahan_id"
                                       value="{{$taman->perumahan_id}}">
                                <input type="hidden" name="id"
                                       value="{{$fototaman->id}}">
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

