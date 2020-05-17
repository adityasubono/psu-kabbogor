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
        <form method="post" action="/jalansalurans/store">
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Kelola Data Jalan dan Saluran :
                            {{$data_perumahan->nama_perumahan}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">
                            ID : {{$data_perumahan->id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body" id="data_jalansaluran">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="data_jalan_saluran[0][perumahan_id]"
                               value="{{$data_perumahan->id}}">

                        <label for="nama_jalansaluran">Nama Jalan Saluran</label><br>
                        <input type="text" class="form-control @error('nama_jalan_saluran')
                               is-invalid @enderror" id="nama_jalan_saluran"
                               name="data_jalan_saluran[0][nama_jalan_saluran]"
                               placeholder="Masukan Nama Jalan dan Saluran"
                               value="{{ old('nama_jalan_saluran') }}">
                        @error('nama_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="luas_sarana">Luas Jalan Saluran</label><br>
                        <input type="number" class="form-control @error('luas_jalan_saluran')
                                     is-invalid @enderror" id="luas_jalan_saluran"
                               name="data_jalan_saluran[0][luas_jalan_saluran]"
                               placeholder="Luas Jalan dan Saluran"
                               value="{{ old('luas_jalan_saluran') }}">
                        @error('luas_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="kondisi_jalan_saluran">Kondisi Jalan dan Saluran</label><br>
                        <select
                            class="custom-select @error('kondisi_jalan_saluran')
                            is-invalid @enderror"
                            id="kondisi_jalan_saluran"
                            name="data_jalan_saluran[0][kondisi_jalan_saluran]"
                            value="{{ old('kondisi_jalan_saluran') }}">
                            <option value="">--Pilih Kondisi Sarana--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                        @error('kondisi_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <label for="aksi">Aksi</label><br>
                        <button type="button" class="btn btn-success btn-icon-split"
                                id="add_data_jalan_saluran">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                            <span class="text">Tambah</span>
                        </button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-icon-split m-3"
                    id="add_data_jalan_saluran">
                        <span class="icon text-white-50">
                             <i class="fas fa-download"></i>
                        </span>
                <span class="text">Input</span>
            </button>
        </form>
    </div>

<!---------------------    Jalan Saluran   ----------------------->

    <form method="post" action="/fotojalansalurans/store" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <h6 class="m-0 font-weight-bold text-primary">
                    Kelola Foto Data Jalan dan Saluran</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-control" name="jalansaluran_id" id="jalansaluran_id">
                            <option value="0">--Pilih Nama Jalan dan Saluran--</option>
                            @forelse( $data_jalan_saluran as $jalansaluran )
                            <option
                                value="{{$jalansaluran->id}}">{{$jalansaluran->nama_jalan_saluran }}</option>
                            @empty
                            <option value="0" style="color: red">
                                Tidak Ada Nama Jalan dan Saluran
                            </option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label for="nama_foto">Nama Foto Jalan dan Saluran</label><br>
                        <input type="text" class="form-control @error('nama_foto')
                               is-invalid @enderror" id="nama_foto" name="nama_foto"
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
                        <label for="file_foto">Upload Foto</label><br>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="file_foto">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input
                                       @error('file_foto') is-invalid @enderror"
                                       id="file_foto"
                                       name="file_foto">
                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                    File</label>
                                @error('file_foto')
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
                                id="add_data_foto_jalan_saluran">
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

    <!--FORM KOORDINAT JALAN DAN SALURAN-->
    <form method="post" action="/koordinatjalansalurans/store" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <h6 class="m-0 font-weight-bold text-primary">
                    Kelola Data Koordinat Jalan dan Saluran</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-control" name="jalansaluran_id" id="jalansaluran_id">
                            <option value="0">--Pilih Nama Jalan Saluran--</option>
                            @forelse( $data_jalan_saluran as $jalansaluran )
                            <option
                                value="{{$jalansaluran->id}}">{{$jalansaluran->nama_jalan_saluran}}</option>
                            @empty
                            <option value="0" style="color: red">
                                Tidak Ada Nama Jalan Saluran</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label for="nama_koordinat">
                            Nama Koordinat Jalan Saluran
                        </label><br>
                        <input type="text" class="form-control
                               @error('nama_koordinat') is-invalid
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Jalan dan Saluran</h6>
        </div>

        <div class="card-body" id="data_sarana">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable"
                       cellspacing="0"
                       style="width:100%">
                    <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Jalan dan Saluran</th>
                        <th>Luas Jalan dan Saluran</th>
                        <th>Kondisi Jalan dan Saluran</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $data_jalan_saluran as $jalansaluran )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jalansaluran->nama_jalan_saluran }}</td>
                        <td>{{ $jalansaluran->luas_jalan_saluran }}</td>
                        <td>{{ $jalansaluran->kondisi_jalan_saluran }}</td>
                        <td>
                            <a href="/saranas/{{$jalansaluran->id }}/edit" class="btn btn-warning
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
                                    <b>Apakah Anda Akan Menghapus Data Ini ID {{ $jalansaluran->id }}?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <form action="/saranas/delete/{{ $jalansaluran->id }}" method="post"
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

    <!--    Tabel Data Foto Jalan Saluran     -->
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
                    @forelse( $data_foto_jalan_saluran as $fotojalansaluran )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fotojalansaluran->nama_foto }}</td>
                        <td><img
                                src="{{ url('assets/uploads/file_jalan_saluran/'
                                     .$fotojalansaluran->file_foto)}}"
                                style="width:75px; height: 75px;"></td>
                        <td>
                            <a href="/saranas/{{ $fotojalansaluran->id }}/edit" class="btn btn-warning
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
                                    <b>Apakah Anda Akan Menghapus Data Ini ID {{ $fotojalansaluran->id }}?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <form action="/fotosaranas/delete/{{ $fotojalansaluran->id }}" method="post"
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Koordinat Jalan dan Saluran</h6>
        </div>

        <div class="card-body" id="data_koordinat_jalansaluran">
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
                    @forelse( $data_koordinat_jalan_saluran as $koordinat_jalansaluran )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $koordinat_jalansaluran->nama_koordinat }}</td>
                        <td>{{ $koordinat_jalansaluran->longitude }}</td>
                        <td>{{ $koordinat_jalansaluran->latitude }}</td>
                        <td>
                            <a href="/saranas/{{ $koordinat_jalansaluran->id }}/edit"
                               class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                                <span class="text">Edit</span>
                            </a>

                            <button class="btn btn-danger btn-icon-split"
                                    data-toggle="modal"
                                    data-target="#confirm-delete-koordinat"
                                    data-backdrop="static"
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
                                    <b>Apakah Anda Akan Menghapus Data Ini ID {{ $koordinat_jalansaluran->id }}?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <form action="/koordinatsarana/delete/{{ $koordinat_jalansaluran->id }}" method="post"
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
<script type="text/javascript" src="../assets/js/jalan_saluran/data_jalansaluran_form.js"></script>
<script type="text/javascript" src="../assets/js/sarana/foto_sarana_form.js"></script>


<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
