<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mt-3">
    <div class="card-header bg-primary text-white">
        Tabel Foto/Gambar Jalan Saluran Perumahan
    </div>
    <div class="card-body" id="data_sarana">
        <div class="row">
            @foreach( $data_foto_jalan_saluran as $fotojalansaluran )
            @foreach( $data_jalan_saluran as $jalansaluran )
            @if( $fotojalansaluran->jalansaluran_id == $jalansaluran->id)
            <div class="col-sm-3">
                <!--Modal: Name-->
                <div class="modal fade" id="foto_jalansaluran{{$fotojalansaluran->id}}"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <form action="/fotojalansalurans/update/{{$fotojalansaluran->id}}"
                                  method="post">
                                @method('patch')
                                @csrf
                                <div class="modal-body m-0 p-0">
                                    <div class="imagereview">
                                        <img src="../../assets/uploads/perumahan/jalansaluran/{{$fotojalansaluran->file_foto}}"
                                             style="width: 100%; height: 600px;">
                                        <div class="content">
                                            <h4>{{$jalansaluran->nama_jalan_saluran}}</h4>
                                            <p class="text-justify">{{$fotojalansaluran->keterangan}}</p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="perumahan_id"
                                           value="{{$jalansaluran->perumahan_id}}">

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
                            src="../../assets/uploads/perumahan/jalansaluran/{{$fotojalansaluran->file_foto}}"
                            alt="{{$fotojalansaluran->file_foto}}"
                            data-toggle="modal"
                            data-target="#foto_jalansaluran{{$fotojalansaluran->id}}"
                            data-backdrop="static"
                            data-keyboard="false"
                            style="width:100%; height: 150px; border-bottom: whitesmoke solid 3px;">
                    </a>
                    <div class="card-body">
                        <b>{{$jalansaluran->nama_jalan_saluran}}</b>
                        <p class="card-text">Keterangan :
                            @php
                            $p = $fotojalansaluran->keterangan;
                            $word = mb_substr($p,0,50);
                            echo "$word...";
                            @endphp
                        </p>

                        <button type="button"
                                class="btn btn-warning m-3 float-left"
                                data-toggle="modal"
                                data-target="#edit_foto_jalansaluran{{ $fotojalansaluran->id }}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <i class="fas fa-pen"></i>
                        </button>

                        <button type="button" class="btn btn-danger m-3 float-right"
                                data-toggle="modal"
                                data-target="#confirm-delete-foto-jalansaluran{{
                                $fotojalansaluran->id}}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade"
                 id="edit_foto_jalansaluran{{ $fotojalansaluran->id }}"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="exampleModalScrollableTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable"
                     role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                Edit Foto / Gambar ID: {{ $fotojalansaluran->id }} || ID Sarana: {{
                                $jalansaluran->id}} ||
                                ID Perumahan: {{ $jalansaluran->perumahan_id}}
                            </h5>
                            <button type="button"
                                    class="close bg-danger p-sm-4"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('PSU_Perumahan.jalansaluran.foto.edit')
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade"
                 id="confirm-delete-foto-jalansaluran{{ $fotojalansaluran->id }}"
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
                            <b>Apakah Anda Akan Menghapus Data Ini ID {{ $fotojalansaluran->id }} ?</b>
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
                                       value="{{$jalansaluran->jalansaluran_id}}">
                                <input type="hidden" name="perumahan_id"
                                       value="{{$jalansaluran->perumahan_id}}">
                                <input type="hidden" name="id"
                                       value="{{$fotojalansaluran->id}}">
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

