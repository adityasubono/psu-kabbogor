<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            @foreach( $data_siteplan as $siteplan )

            <div class="col-sm-4">
                <!--Modal: Name-->
                <div class="modal fade" id="modal{{$siteplan->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <div class="modal-body mb-0 p-0">
                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                    <img class="embed-responsive-item"
                                         src="../../assets/uploads/perumahan/perumahan/{{$siteplan->file_foto}}"
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
                                <a href=""
                                   class="btn btn-outline-warning btn-lg">Simpan
                                </a>

                                <button type="button"
                                        class="btn btn-outline-info btn-lg"
                                        data-dismiss="modal">Keluar
                                </button>
                            </div>

                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Name-->
                <div class="card bg-gray-200">
                    <a><img class="img-fluid z-depth-1 d-inline"
                            src="../../assets/uploads/perumahan/perumahan/{{$siteplan->file_foto}}"
                            alt="{{$siteplan->file_foto}}"
                            data-toggle="modal" data-target="#modal{{$siteplan->id}}"
                            style="width: 100%; height: 150px; border: #738191 3px solid;
                            border-radius: 5px;">
                    </a>
                    <div class="card-body">
                        <p class="card-text">Keterangan : </p>
                        <a href="/fotosaranas/edit/"
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




            </div>

            @endforeach
        </div>
    </div>
</div>



