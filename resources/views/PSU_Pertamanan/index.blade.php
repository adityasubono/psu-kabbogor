@extends('layouts/main')

@section('title', 'Halaman Kelola Data Pertamanan')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/pertamanan.css') !!}" rel="stylesheet">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Pertamanan</h6>
        </div>
        <div class="card-body">
            <a href="/pertamanans/create" class="btn btn-primary btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                <span class="text">Add Data</span>
            </a>

            <form method="get" action="/pertamanans/filter" role="search">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="operator">Filter Kecamatan</label>
                        <select class="custom-select @error('kecamatan') is-invalid @enderror"
                                id="kecamatan" name="kecamatan"
                                value="{{ old('kecamatan') }}">
                            <option value="">--Pilih Kecamatan--</option>
                            @foreach( $kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->nama_kecamatan }}">
                                {{ $kecamatan->nama_kecamatan }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="kelurahan">Filter Keluarahan/Desa</label>
                        <select class="custom-select @error('kelurahan') is-invalid @enderror"
                                id="kelurahan" name="kelurahan"
                                value="{{ old('kelurahan') }}">
                            <option value="">--Pilih Keluarahan--</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="operator">Filter Tahun Dibangun</label>
                        <select
                            class="custom-select @error('tahun') is-invalid @enderror"
                            id="status_perumahan" name="tahun"
                            value="{{ old('tahunh') }}">
                            <option value="">--Pilih Tahun Dibangun--</option>
                            @php
                            $tahun=getdate();
                            @endphp
                            @for($i = $tahun['year']; $i >= 2000; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor

                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="operator">Aksi</label><br>
                        <button type="submit" class="btn btn-info btn-icon-split" id="do-filte">
                            <span class="icon text-white-50">
                                <i class="fas fa-filter"></i>
                            </span>
                            <span class="text">Filter</span>
                        </button>
                    </div>
                </div>
            </form>


            @if (session('status'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <!--     Tabel Pertamanan  -->
            @include('PSU_Pertamanan.includes.tabel_pertamanan')
        </div>
    </div>

</div>

<!--     POPUP Confirm Delete-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                Perhatian !
            </div>
            <div class="modal-body">
                <b>Apakah Anda Akan Menghapus Data Ini ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>

                <form action="/users/" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="../assets/js/getKelurahanPerumahan.js"></script>


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

<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>


@endsection
