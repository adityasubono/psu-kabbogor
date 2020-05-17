@extends('layouts/main')

@section('title', 'Halaman Kelola Data Perumahan')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Perumahan</h6>
        </div>
        <div class="card-body">
            <a href="/users/create" class="btn btn-primary btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                <span class="text">Add Data</span>
            </a>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="operator">Filter Kecamatan</label>
                    <select class="custom-select @error('operator') is-invalid @enderror"
                            id="operator" name="operator"
                            value="{{ old('operator') }}">
                        <option value="">--Pilih Operator--</option>
                        <option value="PSU-Admin">Admin</option>
                        <option value="PSU-Perumahan">Operator PSU Perumahan</option>
                        <option value="PSU-Pertamanan">Operator PSU Pertamanan</option>
                        <option value="PSU-Permukiman">Operator PSU Kawasan Permukiman</option>
                    </select>
                </div>

                <div class="col-sm-3">
                    <label for="operator">Filter Keluarahan/Desa</label>
                    <select class="custom-select @error('operator') is-invalid @enderror"
                            id="operator" name="operator"
                            value="{{ old('operator') }}">
                        <option value="">--Pilih Operator--</option>
                        <option value="PSU-Admin">Admin</option>
                        <option value="PSU-Perumahan">Operator PSU Perumahan</option>
                        <option value="PSU-Pertamanan">Operator PSU Pertamanan</option>
                        <option value="PSU-Permukiman">Operator PSU Kawasan Permukiman</option>
                    </select>
                </div>

                <div class="col-sm-3">
                    <label for="operator">Filter Status</label>
                    <select class="custom-select @error('operator') is-invalid @enderror"
                            id="operator" name="operator"
                            value="{{ old('operator') }}">
                        <option value="">--Pilih Operator--</option>
                        <option value="PSU-Admin">Admin</option>
                        <option value="PSU-Perumahan">Operator PSU Perumahan</option>
                        <option value="PSU-Pertamanan">Operator PSU Pertamanan</option>
                        <option value="PSU-Permukiman">Operator PSU Kawasan Permukiman</option>
                    </select>
                </div>
            </div>



            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered display nowrap table-perumahan" id="dataTable"
                       cellspacing="0"
                       style="width:100%;">
                    <thead class="thead-light">
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nama Perumahan</th>
                        <th rowspan="2">Nama Pengembang</th>
                        <th rowspan="2">Luas Perumahan (m2)</th>
                        <th colspan="4">Lokasi</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <th>Kelurahan/Desa</th>
                        <th>RT</th>
                        <th>RW</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>1.</td>
                        <td><a href="" data-toggle="modal" data-target="#informasi-perumahan">
                                Perumahan Griya Asri Permai</a></td>
                        <td>PT. Adhi Karya</td>
                        <td>1000 m2</td>
                        <td>Bojong Gede</td>
                        <td>Bojong Baru</td>
                        <td>36</td>
                        <td>4</td>
                        <td>
                            <a href="/users//edit" class="btn btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                                <span class="text">Edit</span>
                            </a>


                            <button class="btn btn-danger btn-icon-split" data-toggle="modal"
                                    data-target="#confirm-delete" data-backdrop="static"
                                    data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                                <span class="text">Delete</span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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


<!--Pop Up Data Perumahan-->
<div class="modal fade" id="informasi-perumahan" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title">Perumahan Griya Asri Permai</h4>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="popup-table-perumahan">
                    <tr>
                        <td>Nama Pengembang</td>
                        <td class="titik-dua">:</td>
                        <td width="300">PT. Adhi Karya</td>
                        <td rowspan="9" width="300"><img src="assets/images/cctv.png" alt="cctv"
                                                         class="cctv">
                        </td>
                    </tr>
                    <tr>
                        <td>Luas Perumahan (m2)</td>
                        <td>:</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><a href="" data-toggle="modal"
                               data-target="#informasi-foto-perumahan">8</a></td>
                    </tr>
                    <tr>
                        <td colspan="3">Lokasi</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>Bojong Gede</td>
                    </tr>
                    <tr>
                        <td>Kelurahan/Desa</td>
                        <td>:</td>
                        <td>Bojong Baru</td>
                    </tr>
                    <tr>
                        <td>RT</td>
                        <td>:</td>
                        <td>34</td>
                    </tr>
                    <tr>
                        <td>RW</td>
                        <td>:</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="">Selengkapnya...</a></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal Foto -->
<div class="modal" tabindex="-1" role="dialog" id="informasi-foto-perumahan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-bold text-dark">
                <h5 class="modal-title">Perumahan Griya Asri Permai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row grid-divider">
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="Berbgembira Ria"
                               data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                               data-target="#image-gallery">
                                <img class="img-thumbnail"
                                     src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                     alt="Another alt text">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="Berbgembira Ria"
                               data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                               data-target="#image-gallery">
                                <img class="img-thumbnail"
                                     src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                     alt="Another alt text">
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="Berbgembira Ria"
                               data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                               data-target="#image-gallery">
                                <img class="img-thumbnail"
                                     src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                     alt="Another alt text">
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="col-padding">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-title="Berbgembira Ria"
                               data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                               data-target="#image-gallery">
                                <img class="img-thumbnail"
                                     src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                     alt="Another alt text">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Foto View-->


<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title"></h4>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
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


@endsection
