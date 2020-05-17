

<!--Pop Up Data Perumahan-->
@foreach( $pertamanans as $pertamanan )
<div class="modal fade" id="informasi-perumahan{{ $loop->iteration }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title">{{$pertamanan->nama_taman}}</h4>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="popup-table-perumahan">
                    <tr>
                        <td>Nama Pengembang</td>
                        <td class="titik-dua">:</td>
                        <td width="300">{{$pertamanan->nama_pengembang}}</td>
                        <td rowspan="9" width="300"><img src="../assets/images/cctv.png" alt="cctv"
                                                         class="cctv">
                        </td>
                    </tr>
                    <tr>
                        <td>Luas Taman(m2)</td>
                        <td>:</td>
                        <td>{{$pertamanans->luas_taman}}</td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><a href="" data-toggle="modal"
                               data-target="#informasi-foto-perumahan{{$pertamanans->id}}">
                                {{$pertamanan->r_foto_sarana->count()}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Lokasi</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>{{$pertamanan->kecamatan}}</td>
                    </tr>
                    <tr>
                        <td>Kelurahan/Desa</td>
                        <td>:</td>
                        <td>{{$pertamanan->kelurahan}}</td>
                    </tr>
                    <tr>
                        <td>RT</td>
                        <td>:</td>
                        <td>{{$pertamanan->RT}}</td>
                    </tr>
                    <tr>
                        <td>RW</td>
                        <td>:</td>
                        <td>{{$pertamanan->RW}}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><br>
                            <textarea disabled class="form-control"
                                      style="background: none; border: none"
                                      rows="2">{{$pertamanans->keterangan}}
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="/perumahans/{{ $pertamanans->id }}">
                                Selengkapnya...</a></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach




<!--Modal Foto -->
@foreach( $pertamanans as $pertamanan )
<div class="modal" tabindex="-1" role="dialog" id="informasi-foto-perumahan{{ $loop->iteration }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-bold text-dark">
                <h5 class="modal-title">{{$pertamanan->nama_perumahan}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row grid-divider">
                    @foreach( $pertamanan->r_foto_sarana as $foto )
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="{{$foto->nama_foto}}"
                               data-image="assets/uploads/file_sarana/{{$foto->file_foto}}"
                               data-target="#image-gallery{{$loop->iteration}}">
                                <img class="img-thumbnail"
                                     src="assets/uploads/file_sarana/{{$foto->file_foto}}"
                                     alt="{{$foto->nama_foto}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Foto View Image ------->

@foreach( $pertamanans as $pertamanan )
@foreach( $pertamanan->r_foto_sarana as $foto )
<div class="modal fade" id="image-gallery{{$loop->iteration}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title">{{$foto->nama_foto}}</h4>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive col-md-12" src="assets/uploads/file_sarana/{{$foto->file_foto}}">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary float-left" id="show-previous-image">
                    <i class="fa fa-arrow-left"></i>
                </button>

                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i
                        class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
