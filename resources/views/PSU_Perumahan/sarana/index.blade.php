@extends('layouts/main')

@section('title', 'Input Data Sarana Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <form method="post" action="/saranas/store">
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Sarana :
                            {{$data_perumahan->nama_perumahan}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">
                            ID : {{$data_perumahan->id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body bg-gray-200" id="data_sarana">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="data_sarana[0][perumahan_id]"
                               value="{{$data_perumahan->id}}">

                        <label for="nama_sarana">Nama Sarana</label><br>
                        <input type="text" class="form-control @error('nama_sarana') is-invalid
                                           @enderror" id="nama_sarana"
                               name="data_sarana[0][nama_sarana]"
                               placeholder="Masukan Nama Sarana"
                               value="{{ old('nama_sarana') }}">
                        @error('nama_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="luas_sarana">Luas Sarana</label><br>
                        <input type="number" class="form-control @error('luas_sarana')
                                           is-invalid @enderror" id="luas_sarana"
                               name="data_sarana[0][luas_sarana]"
                               placeholder="Luas Sarana"
                               value="{{ old('luas_sarana') }}">
                        @error('luas_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="kondisi_sarana">Kondisi Sarana</label><br>
                        <select
                            class="custom-select @error('kondisi_sarana') is-invalid @enderror"
                            id="kondisi_sarana"
                            name="data_sarana[0][kondisi_sarana]"
                            value="{{ old('kondisi_sarana') }}">
                            <option value="">--Pilih Kondisi Sarana--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                        @error('kondisi_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <label for="aksi">Aksi</label><br>
                        <button type="button" class="btn btn-success btn-icon-split"
                                id="add_data_sarana">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                            <span class="text">Tambah</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <form method="post" action="/fotosaranas/store" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <h6 class="m-0 font-weight-bold text-primary">Kelola Foto Data Sarana</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-control" name="sarana_id" id="sarana_id">
                            <option value="0">--Pilih Nama Sarana--</option>
                            @forelse( $data_sarana as $sarana )
                            <option value="{{$sarana->id}}">{{$sarana->nama_sarana}}</option>
                            @empty
                            <option value="0" style="color: red">Tidak Ada Nama Sarana</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label for="nama_foto">Nama Foto Sarana</label><br>
                        <input type="text" class="form-control @error('nama_foto') is-invalid
                                 @enderror" id="nama_foto" name="nama_foto"
                               placeholder="Masukan Nama Foto"
                               value="{{ old('nama_foto') }}">
                        @error('nama_foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$data_perumahan->id}}">
                    </div>

                    <div class="col-sm-4">
                        <label for="file_foto_sarana">Upload Foto</label><br>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="file_foto">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input
                                   @error('file_foto_sarana') is-invalid @enderror"
                                       id="file_foto_sarana"
                                       name="file_foto_sarana">
                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                    File</label>
                                @error('file_foto_sarana')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="aksi">Aksi</label><br>
                        <button type="button" class="btn btn-success btn-icon-split"
                                id="add_data_foto_sarana">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </button>
                        <button type="submit" class="btn btn-info btn-icon-split"
                                id="reset_data">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--                <input type="hidden" id="jumlah-form" value="0">-->

<!--FORM KOORDINAT SARANA-->
    <form method="post" action="/koordinatsarana/store" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <h6 class="m-0 font-weight-bold text-primary">Kelola Data Koordinat Sarana</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-control" name="sarana_id" id="sarana_id">
                            <option value="0">--Pilih Nama Sarana--</option>
                            @forelse( $data_sarana as $sarana )
                            <option value="{{$sarana->id}}">{{$sarana->nama_sarana}}</option>
                            @empty
                            <option value="0" style="color: red">Tidak Ada Nama Sarana</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label for="nama_koordinat">Nama Koordinat Sarana</label><br>
                        <input type="text" class="form-control @error('nama_koordinat') is-invalid
                                 @enderror" id="nama_koordinat" name="nama_koordinat"
                               placeholder="Masukan Nama Foto"
                               value="{{ old('nama_koordinat') }}">
                        @error('nama_koordinat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="col-sm-4">
                        <label for="longitude">Koordinat Longitude</label><br>
                        <input type="text" class="form-control @error('longitude') is-invalid
                                 @enderror" id="longitude" name="longitude"
                               placeholder="Masukan Nama Foto"
                               value="{{ old('longitude') }}">
                        @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$data_perumahan->id}}">
                    </div>

                    <div class="col-sm-4">
                        <label for="latitude">Koordinat Latitude</label><br>
                        <input type="text" class="form-control @error('latitude') is-invalid
                                 @enderror" id="latitude" name="latitude"
                               placeholder="Masukan Nama Foto"
                               value="{{ old('latitude') }}">
                        @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$data_perumahan->id}}">
                    </div>

                    <div class="col-sm-4 mt-3">
<!--                        <button type="button" class="btn btn-success btn-icon-split"-->
<!--                                id="add_data_foto_sarana">-->
<!--                            <span class="icon text-white-50">-->
<!--                                <i class="fas fa-plus"></i>-->
<!--                            </span>-->
<!--                            <span class="text">Tambah</span>-->
<!--                        </button>-->
                        <button type="submit" class="btn btn-info btn-icon-split"
                                id="reset_data">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<!--    Tabel Data Sarana     -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Sarana</h6>
        </div>

        <div class="card-body" id="data_sarana">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable"
                       cellspacing="0"
                       style="width:100%">
                    <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Sarana</th>
                        <th>Luas Sarana</th>
                        <th>Kondisi Sarana</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $data_sarana as $sarana )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sarana->nama_sarana }}</td>
                        <td>{{ $sarana->luas_sarana }}</td>
                        <td>{{ $sarana->kondisi_sarana }}</td>
                        <td>
                            <a href="/saranas/{{$sarana->id }}/edit" class="btn btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                                <span class="text">Edit</span>
                            </a>


                            <button class="btn btn-danger btn-icon-split"
                                    data-toggle="modal"
                                    data-target="#confirm-delete-sarana" data-backdrop="static"
                                    data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                                <span class="text">Delete</span>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="confirm-delete-sarana" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                Perhatian !
                            </div>
                            <div class="modal-body">
                                <b>Apakah Anda Akan Menghapus Data Ini ID {{ $sarana->id }}?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="/saranas/delete/{{ $sarana->id }}" method="post"
                                      class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center"><b style="color: red">
                                Data Tidak Tersedia<b></td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--    Tabel Data Foto     -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Foto</h6>
        </div>

        <div class="card-body" id="data_sarana">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable"
                       cellspacing="0"
                       style="width:100%">
                    <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Foto</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $data_foto_sarana as $fotosarana )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fotosarana->nama_foto }}</td>
                        <td><img
                                src="{{ url('assets/uploads/file_sarana/'.$fotosarana->file_foto)}}"
                                style="width:75px; height: 75px;"></td>
                        <td>
                            <a href="/saranas/{{ $fotosarana->id }}/edit" class="btn btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                                <span class="text">Edit</span>
                            </a>

                            <button class="btn btn-danger btn-icon-split"
                                    data-toggle="modal"
                                    data-target="#confirm-delete-foto" data-backdrop="static"
                                    data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                                <span class="text">Delete</span>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="confirm-delete-foto" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    Perhatian !
                                </div>
                                <div class="modal-body">
                                    <b>Apakah Anda Akan Menghapus Data Ini ID {{ $fotosarana->id }}?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <form action="/fotosaranas/delete/{{ $fotosarana->id }}" method="post"
                                          class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center"><b style="color: red">
                                Data Tidak Tersedia<b></td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!--    Tabel Koordinat Sarana      -->

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Koordinat Sarana</h6>
        </div>

        <div class="card-body" id="data_sarana">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable"
                       cellspacing="0"
                       style="width:100%">
                    <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Koordinat</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $data_koordinat_sarana as $koordinat_sarana )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $koordinat_sarana->nama_koordinat }}</td>
                        <td>{{ $koordinat_sarana->longitude }}</td>
                        <td>{{ $koordinat_sarana->latitude }}</td>
                        <td>
                            <a href="/saranas/{{ $fotosarana->id }}/edit" class="btn btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                                <span class="text">Edit</span>
                            </a>

                            <button class="btn btn-danger btn-icon-split"
                                    data-toggle="modal"
                                    data-target="#confirm-delete-koordinat" data-backdrop="static"
                                    data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                                <span class="text">Delete</span>
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="confirm-delete-koordinat" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    Perhatian !
                                </div>
                                <div class="modal-body">
                                    <b>Apakah Anda Akan Menghapus Data Ini ID {{ $koordinat_sarana->id }}?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <form action="/koordinatsarana/delete/{{ $koordinat_sarana->id }}" method="post"
                                          class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center"><b style="color: red">
                                Data Tidak Tersedia<b></td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>




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

<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/sarana/data_sarana_form.js"></script>
<script type="text/javascript" src="../assets/js/sarana/foto_sarana_form.js"></script>


<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
