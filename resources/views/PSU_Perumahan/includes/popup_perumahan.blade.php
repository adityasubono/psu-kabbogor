@foreach( $perumahans as $perumahan )
<div class="modal fade" id="informasi-perumahan{{ $loop->iteration }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-primary bg-gray-200">
                <h5 class="modal-title">{{$perumahan->nama_perumahan}}</h5>
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
                            <video width="300" height="300" autoplay controls>
                                <source src="%StreamURL%" type="video/mp4">
                                <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
                                    <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" />
                                    <param name="flashvars" value='config={"clip": {"url": "%StreamURL%", "autoPlay":true, "autoBuffering":true}}' />
                                    <p><a href="%StreamURL%">view with external app</a></p>
                                </object>
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
                                echo "$total_foto";
                                @endphp
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Lokasi</td>
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
                        <td>RT</td>
                        <td>:</td>
                        <td>{{$perumahan->RT}}</td>
                    </tr>
                    <tr>
                        <td>RW</td>
                        <td>:</td>
                        <td>{{$perumahan->RW}}</td>
                    </tr>
                    <tr>
                        <td>Status<br><br><br><br></td>
                        <td>:<br><br><br><br></td>
                        <td><b>{{$perumahan->status_perumahan}}</b>
                            <br>
                            Tanggal Serah Terima : {{$perumahan->tgl_serah_terima}}
                            <br>
                            No. BAST : {{$perumahan->no_bast}}
                            <br>
                            Jumlah PSU yang Diserahkan :


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
                        <td colspan="3"><a href="/perumahans/{{ $perumahan->id }}">
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


@foreach( $perumahans as $perumahan )
<div class="modal" tabindex="-1" role="dialog" id="informasi-foto-perumahan{{$perumahan->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray-200 text-primary text-bold">
                <h5 class="modal-title">Galery Foto </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label class="m-0">Foto Sarana : </label>
                <br>
                <div class="row grid-divider">
                    @foreach( $perumahan->r_foto_sarana as $foto )
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="{{$foto->nama_foto}}"
                               data-image="../assets/uploads/perumahan/sarana/{{$foto->file_foto}}"
                               data-target="#image-gallery-sarana{{$loop->iteration}}">
                                <img class="img-thumbnail"
                                     src="../assets/uploads/perumahan/sarana/{{$foto->file_foto}}"
                                     alt="{{$foto->nama_foto}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <hr>
                <label class="m-0">Foto Jalan Saluran :</label>
                <br>
                <div class="row grid-divider">
                    @foreach( $perumahan->r_foto_jalan_saluran as $foto )
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="{{$foto->nama_foto}}"
                               data-image="../assets/uploads/perumahan/jalansaluran/{{$foto->file_foto}}"
                               data-target="#image-gallery-jalansaluran{{$loop->iteration}}">
                                <img class="img-thumbnail"
                                     src="../assets/uploads/perumahan/jalansaluran/{{$foto->file_foto}}"
                                     alt="{{$foto->nama_foto}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <hr>
                <label class="m-0 p-0">Foto Taman :</label>
                <div class="row grid-divider">
                    @foreach( $perumahan->r_foto_taman as $foto )
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="{{$foto->nama_foto}}"
                               data-image="../assets/uploads/perumahan/taman/{{$foto->file_foto}}"
                               data-target="#image-gallery-taman{{$loop->iteration}}">
                                <img class="img-thumbnail"
                                     src="../assets/uploads/perumahan/taman/{{$foto->file_foto}}"
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

@foreach( $perumahans as $perumahan )
@foreach( $perumahan->r_foto_sarana as $foto )
<div class="modal fade" id="image-gallery-sarana{{$loop->iteration}}" tabindex="-1" role="dialog"
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
                <img id="image-gallery-image" class="img-responsive col-md-12"
                     src="../assets/uploads/perumahan/sarana/{{$foto->file_foto}}">
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
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title">{{$foto->nama_foto}}</h4>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive col-md-12" src="
                ../assets/uploads/perumahan/jalansaluran/{{$foto->file_foto}}">
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
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title">{{$foto->nama_foto}}</h4>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>

            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive col-md-12" src="
                ../assets/uploads/perumahan/taman/{{$foto->file_foto}}">
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach

<script type="text/javascript">
    let modalId = $('#image-gallery');

    $(document)
    .ready(function () {

        loadGallery(true, 'a.thumbnail');

        //This function disables buttons when needed
        function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image')
            .show();
            if (counter_max === counter_current) {
                $('#show-next-image')
                .hide();
            } else if (counter_current === 1) {
                $('#show-previous-image')
                .hide();
            }
        }

        /**
         *
         * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
         * @param setClickAttr  Sets the attribute for the click handler.
         */

        function loadGallery(setIDs, setClickAttr) {
            let current_image,
                selector,
                counter = 0;

            $('#show-next-image, #show-previous-image')
            .click(function () {
                if ($(this)
                .attr('id') === 'show-previous-image') {
                    current_image--;
                } else {
                    current_image++;
                }

                selector = $('[data-image-id="' + current_image + '"]');
                updateGallery(selector);
            });

            function updateGallery(selector) {
                let $sel = selector;
                current_image = $sel.data('image-id');
                $('#image-gallery-title')
                .text($sel.data('title'));
                $('#image-gallery-image')
                .attr('src', $sel.data('image'));
                disableButtons(counter, $sel.data('image-id'));
            }

            if (setIDs == true) {
                $('[data-image-id]')
                .each(function () {
                    counter++;
                    $(this)
                    .attr('data-image-id', counter);
                });
            }
            $(setClickAttr)
            .on('click', function () {
                updateGallery($(this));
            });
        }
    });

    // build key actions
    $(document)
    .keydown(function (e) {
        switch (e.which) {
            case 37: // left
                if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(
                    ":visible")) {
                    $('#show-previous-image')
                    .click();
                }
                break;

            case 39: // right
                if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(
                    ":visible")) {
                    $('#show-next-image')
                    .click();
                }
                break;

            default:
                return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
    });

</script>


