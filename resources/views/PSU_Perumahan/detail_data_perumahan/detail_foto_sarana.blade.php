<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Tabel Foto/Gambar Sarana Perumahan
    </div>
    <div class="card-body" id="data_sarana">
        <div class="row">
            @foreach( $data_foto_sarana as $fotosarana )
            @foreach( $data_sarana as $sarana )
            @if($fotosarana->sarana_id == $sarana->id)
            <div class="col-sm-2">
                <!--Modal: Name-->
                <div class="modal fade" id="modal_foto_sarana{{$fotosarana->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <form action="/fotosaranas/update/{{$fotosarana->id}}" method="post">
                                @method('patch')
                                @csrf
                                <div class="modal-body m-0 p-0">
                                    <div class="imagereview">
                                        <img src="../../assets/uploads/perumahan/sarana/{{$fotosarana->file_foto}}" style="width: 100%; height: 600px;">
                                        <div class="content">
                                            <h4>{{$sarana->nama_sarana}}</h4>
                                            <p class="text-justify">Keterangan : {{$fotosarana->keterangan}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer-->
                                <div class="modal-footer m-2">
                                    <button type="button" class="btn btn-outline-danger btn-lg float-right" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Name-->

                <div class="card mb-3" style="border: cornsilk solid 3px;">
                    <div class="imagereview">
                        <img src="../../assets/uploads/perumahan/sarana/{{$fotosarana->file_foto}}" style="width: 100%; height: 165px;" data-toggle="modal" data-target="#modal_foto_sarana{{$fotosarana->id}}" data-backdrop="static" data-keyboard="false">
                        <div class="content_sarana">
                            <p>{{$sarana->nama_sarana}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit_foto_sarana{{ $fotosarana->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                Edit Foto / Gambar ID: {{ $fotosarana->id }} || ID Sarana: {{
                                $sarana->id}} ||
                                ID Perumahan: {{ $sarana->perumahan_id}}
                            </h5>
                            <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('PSU_Perumahan.sarana.foto.edit')
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="confirm-delete-foto{{ $fotosarana->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            <form action="/fotosaranas/delete" method="post" class="d-inline">
                                <input type="hidden" name="filename" value="{{$fotosarana->file_foto}}">
                                <input type="hidden" name="sarana_id" value="{{$sarana->sarana_id}}">
                                <input type="hidden" name="perumahan_id" value="{{$sarana->perumahan_id}}">
                                <input type="hidden" name="id" value="{{$fotosarana->id}}">
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