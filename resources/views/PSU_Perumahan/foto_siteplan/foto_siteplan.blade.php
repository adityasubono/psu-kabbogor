<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mb-4">
    <div class="card-header text-white bg-primary">
        Data Foto/Gambar Siteplan Perumahan
    </div>
    <div class="card-body">
        <div class="row">
            @foreach( $data_siteplan as $siteplan )

            <div class="col-sm-3">
                <!--Modal: Name-->
                <div class="modal fade" id="modal{{$siteplan->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <form action="/fotositeplans/update/{{$siteplan->id}}" method="post">
                                @method('patch')
                                @csrf
                                <div class="modal-body mb-0 p-0">
                                    <div class="imagereview">
                                        <img src="../../assets/uploads/perumahan/perumahan/{{$siteplan->file_foto}}"
                                             style="width: 100%; height: 600px;">
                                        <div class="content">
                                            <p class="text-justify">{{$siteplan->keterangan}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer-->
                                <div class="modal-footer justify-content-center">
                                <textarea class="form-control"
                                          id="keterangan"
                                          name="keterangan"
                                          rows="2"
                                          placeholder="Masukan Keterangan Gambar Disini"></textarea>

                                    <input type="hidden" name="perumahan_id"
                                           value="{{$siteplan->perumahan_id}}">

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
                <div class="card" style="background-color: whitesmoke">
                    <a><img class="img-fluid z-depth-1 d-inline"
                            src="../../assets/uploads/perumahan/perumahan/{{$siteplan->file_foto}}"
                            alt="{{$siteplan->file_foto}}"
                            data-toggle="modal" data-target="#modal{{$siteplan->id}}"
                            style="width: 100%; height: 150px; border: #738191 3px solid;
                            border-radius: 5px;">
                    </a>
                    <div class="card-body">
                        <p class="card-text">Keterangan :
                            @php
                            $p = $siteplan->keterangan;
                            $word = mb_substr($p,0,50);
                            echo "$word...";
                            @endphp
                        </p>

                        <button type="button"
                                class="btn btn-warning m-3 float-left"
                                data-toggle="modal"
                                data-target="#edit_foto_siteplan{{ $siteplan->id }}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <i class="fas fa-pen"></i>
                        </button>

                        <button type="button" class="btn btn-danger m-3 float-right"
                                data-toggle="modal"
                                data-target="#confirm-delete-foto-siteplan{{ $siteplan->id}}"
                                data-backdrop="static"
                                data-keyboard="false">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit_foto_siteplan{{ $siteplan->id }}" tabindex="-1"
                 role="dialog"
                 aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                Edit Foto / Gambar ID: {{ $siteplan->id }} ||
                                ID Perumahan: {{ $siteplan->perumahan_id}}
                            </h5>
                            <button type="button"
                                    class="close bg-danger p-sm-4"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('PSU_Perumahan.foto_siteplan.edit')
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade"
                 id="confirm-delete-foto-siteplan{{ $siteplan->id }}"
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
                            <b>Apakah Anda Akan Menghapus Data Ini ID {{ $siteplan->id }} ?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                Batal
                            </button>
                            <form action="/fotositeplans/delete" method="post"
                                  class="d-inline">
                                <input type="hidden" name="filename"
                                       value="{{$siteplan->file_foto}}">
                                <input type="hidden" name="perumahan_id"
                                       value="{{$siteplan->perumahan_id}}">
                                <input type="hidden" name="id"
                                       value="{{$siteplan->id}}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-ok">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach
        </div>
    </div>
</div>



