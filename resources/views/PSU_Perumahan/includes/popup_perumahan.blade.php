@foreach( $perumahans as $perumahan )
<link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">

<div class="modal fade" id="informasi-perumahan{{ $loop->iteration }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white bg-primary">
                {{$perumahan->nama_perumahan}}
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="popup-table-perumahan">
                    <tr>
                        <td width="300">Nama Pengembang</td>
                        <td class="titik-dua">:</td>
                        <td width="500">{{$perumahan->nama_pengembang}}</td>
                        <td rowspan="9" width="300">
                            <video class="video-js vjs-default-skin" width="400" height="300" controls autoplay="true" id="hls-example">
                                <source src="../../assets/video/test1.m3u8" type="application/x-mpegURL">
                            </video>
                        </td>
                    </tr>
                    <tr>
                        <td>Luas Perumahan (m2)</td>
                        <td>:</td>
                        <td>{{$perumahan->luas_perumahan}}</td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><a href="" data-toggle="modal"
                               data-target="#informasi-foto-perumahan{{$perumahan->id}}">
                                @php
                                $a = $perumahan->r_foto_sarana->count();
                                $b = $perumahan->r_foto_jalan_saluran->count();
                                $c = $perumahan->r_foto_taman->count();
                                $total_foto = $a+$b+$c;
                                echo "$total_foto file";
                                @endphp
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Lokasi</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$perumahan->lokasi}}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>{{$perumahan->kecamatan}}</td>
                    </tr>
                    <tr>
                        <td>Kelurahan/Desa</td>
                        <td>:</td>
                        <td>{{$perumahan->kelurahan}}</td>
                    </tr>
                    <tr>
                        <td>Status<br><br><br><br></td>
                        <td>:<br><br><br><br></td>
                        <td>

                            @if( $perumahan->status_perumahan == 'Sudah Serah Terima')
                            <b style="color: green">{{$perumahan->status_perumahan}}</b>
                            @foreach($data_bast as $bast)
                            @if($perumahan->id == $bast->perumahan_id)
                            <br>
                            Tanggal Serah Terima : <b>{{$bast->tanggal}}</b>
                            <br>
                            No. BAST : <b>{{$bast->no_bast}}</b>
                            @endif
                            @endforeach

                            @elseif ($perumahan->status_perumahan == 'Belum Serah Terima')

                            @foreach($data_basta as $basta)
                            @if($perumahan->id == $basta->perumahan_id)
                            <b style="color: goldenrod">{{$perumahan->status_perumahan}}</b>
                            <br>
                            Tanggal Serah Terima : <b>{{$basta->tanggal}}</b>
                            <br>
                            No. BASTA : <b>{{$basta->no_basta}}</b>

                            @endif
                            @endforeach
                            @else
                            <b style="color: red">{{$perumahan->status_perumahan}}</b>
                            @endif
                            <br>
                            @php
                            $a = $perumahan->r_sarana->count();
                            $b = $perumahan->r_jalan_saluran->count();
                            $c = $perumahan->r_taman->count();
                            $d = $perumahan->r_cctv_perumahan->count();
                            $e = $perumahan->r_pju->count();
                            $f = $perumahan->r_saluran->count();
                            $jumlah_psu = $a+$b+$c+$d+$e+$f;
                            echo "Jumlah PSU Yang Diserahkan : <b>$jumlah_psu Unit</b>";
                            @endphp

                        </td>
                    </tr>

                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>
                            {{$perumahan->keterangan}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="/perumahans/edit/{{ $perumahan->id }}">
                                Data Selengkapnya...</a></td>
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


@foreach( $perumahans as $perumahan )
<div class="modal" tabindex="-1" role="dialog" id="informasi-foto-perumahan{{$perumahan->id}}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white text-bold">
                <h5 class="modal-title">Galery Foto </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px; overflow-y: auto;">
                <h5 class="mt-3">Foto Sarana Perumahan</h5>
                @foreach( $perumahan->r_foto_sarana as $foto )
                <a class="thumbnail m-1" href="#" data-image-id="" data-toggle="modal"
                   data-title="{{$foto->nama_foto}}"
                   data-image="../assets/uploads/perumahan/sarana/{{$foto->file_foto}}"
                   data-target="#image-gallery-sarana{{$loop->iteration}}">
                    <img class="img-thumbnail"
                         src="../assets/uploads/perumahan/sarana/{{$foto->file_foto}}"
                         alt="{{$foto->nama_foto}}" style="width: 125px; height: 125px;">
                </a>
                @endforeach
                <h5 class="mt-3">Foto Jalan Saluran Perumahan</h5>
                @foreach( $perumahan->r_foto_jalan_saluran as $foto )
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                   data-title="{{$foto->nama_foto}}"
                   data-image="../assets/uploads/perumahan/jalansaluran/{{$foto->file_foto}}"
                   data-target="#image-gallery-jalansaluran{{$loop->iteration}}">
                    <img class="img-thumbnail m-1"
                         src="../assets/uploads/perumahan/jalansaluran/{{$foto->file_foto}}"
                         alt="{{$foto->nama_foto}}"
                         style="width: 125px; height: 125px;">
                </a>
                @endforeach

                <h5 class="mt-3">Foto Jalan Saluran Perumahan</h5>
                @foreach( $perumahan->r_foto_taman as $foto )
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                   data-title="{{$foto->nama_foto}}"
                   data-image="../assets/uploads/perumahan/taman/{{$foto->file_foto}}"
                   data-target="#image-gallery-taman{{$loop->iteration}}">
                    <img class="img-thumbnail m-1"
                         src="../assets/uploads/perumahan/taman/{{$foto->file_foto}}"
                         alt="{{$foto->nama_foto}}"
                         style="width: 125px; height: 125px;">
                </a>
                @endforeach

                <h5 class="mt-3">Foto Gambar Perumahan/Siteplan</h5>
                @foreach( $perumahan->r_foto_perumahan as $foto )
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                   data-title="{{$foto->nama_foto}}"
                   data-image="../assets/uploads/perumahan/perumahan/{{$foto->file_foto}}"
                   data-target="#image-gallery-perumahan{{$loop->iteration}}">
                    <img class="img-thumbnail m-1"
                         src="../assets/uploads/perumahan/perumahan/{{$foto->file_foto}}"
                         alt="{{$foto->nama_foto}}"
                         style="width: 125px; height: 125px;">
                </a>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Foto View Image ------->

@foreach( $perumahans as $perumahan )
@foreach( $perumahan->r_foto_sarana as $foto )
<div class="modal fade" id="image-gallery-sarana{{$loop->iteration}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
               <h5>Gambar Sarana {{$loop->iteration}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="imagereview">
                    <img id="image-gallery-image" class="img-responsive col-md-12"
                         src="../assets/uploads/perumahan/sarana/{{$foto->file_foto}}"
                         style="width: 100%; max-height: 500px; padding: 0px">
                    <div class="content">
                        <p class="text-justify">Keterangan :<br>{{$foto->keterangan}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach( $perumahan->r_foto_jalan_saluran as $foto )
<div class="modal fade" id="image-gallery-jalansaluran{{$loop->iteration}}" tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5>Gambar Jalan Saluran {{$loop->iteration}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="imagereview">
                    <img id="image-gallery-image" class="img-responsive col-md-12"
                         src="../assets/uploads/perumahan/jalansaluran/{{$foto->file_foto}}"
                         style="width: 100%; max-height: 500px; padding: 0px">
                    <div class="content">
                        <p class="text-justify">Keterangan : <br>{{$foto->keterangan}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach




@foreach( $perumahan->r_foto_taman as $foto )
<div class="modal fade" id="image-gallery-taman{{$loop->iteration}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
               <h5>Gambar Taman dan Penghijauan {{$loop->iteration}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="imagereview">
                    <img id="image-gallery-image" class="img-responsive col-md-12"
                         src="../assets/uploads/perumahan/taman/{{$foto->file_foto}}"
                         style="width: 100%; max-height: 500px; padding: 0px">
                    <div class="content">
                        <p class="text-justify">Keterangan :<br>{{$foto->keterangan}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@foreach( $perumahan->r_foto_perumahan as $foto )
<div class="modal fade" id="image-gallery-perumahan{{$loop->iteration}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5>Gambar Perumahan/Siteplan {{$loop->iteration}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="imagereview">
                <img id="image-gallery-image" class="img-responsive col-md-12"
                     src="../assets/uploads/perumahan/perumahan/{{$foto->file_foto}}"
                     style="width: 100%; max-height: 500px; padding: 0px">
                    <div class="content">
                        <p class="text-justify">Keterangan :<br>{{$foto->keterangan}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endforeach



<link href="https://vjs.zencdn.net/7.8.2/video-js.css" rel="stylesheet" />
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://vjs.zencdn.net/7.8.2/video.js"></script>
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
    var player = videojs('hls-example');
    player.play();
</script>
