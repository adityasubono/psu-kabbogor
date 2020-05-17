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
            <a href="/perumahans/create" class="btn btn-primary btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                <span class="text">Add Data</span>
            </a>

            <form method="get" action="/perumahans/filter" role="search">
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
                        <label for="operator">Filter Status</label>
                        <select
                            class="custom-select @error('status_perumahan') is-invalid @enderror"
                            id="status_perumahan" name="status_perumahan"
                            value="{{ old('status_perumahan') }}">
                            <option value="">--Pilih Status--</option>
                            <option value="Sudah">Sudah Serah Terima</option>
                            <option value="Belum">Belum Serah Terima</option>
                            <option value="Terlantar">Terlantar</option>
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

            <div class="table-responsive">
                <table class="table table-bordered display nowrap table-perumahan"
                       id="dataTable"
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

                    @foreach( $perumahans as $perumahan )
                    @if ($perumahan->status_perumahan === 'Sudah')

                    <tr class="bg-success text-dark text-bold">
                        @elseif ($perumahan->status_perumahan === 'Belum')
                    <tr class="bg-warning text-dark text-bold">
                        @elseif ($perumahan->status_perumahan === 'Terlantar')
                    <tr class="bg-danger text-dark text-bold">
                        @endif
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <nav class="d-inline">
                                <button class="navbar-toggler border-0" type="button"
                                        data-toggle="collapse"
                                        data-target="#dataInput{{ $loop->iteration }}">
                                    <span class="fas fa-info-circle"></span>
                                </button>
                            </nav>
                            <a href="" data-toggle="modal"
                               data-target="#informasi-perumahan{{ $loop->iteration }}">
                                {{ $perumahan->nama_perumahan }}
                            </a>
                            <div class="collapse bg-light rounded p-2" id="dataInput{{
                                 $loop->iteration }}">

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header bg-gray-200 p-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link"
                                                        data-toggle="collapse"
                                                        data-target="#dataperumahan">
                                                    Data Perumahan
                                                </button>

                                                @if(($perumahan->count()) === 0)
                                                <span class="badge badge-danger text-center
                                                rata_kanan">
                                                 <i class="fas fa-times"></i>
                                                </span>
                                                @else
                                                <span class="badge badge-success text-center
                                                rata_kanan">
                                                 <i class="fas fa-check"></i>
                                                </span>
                                                @endif
                                            </h5>
                                        </div>
                                        <div id="dataperumahan" class="collapse"
                                             data-parent="#accordion">
                                            <div class="card-body p-3">
                                                <a href="">Edit Data Perumahan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header bg-gray-200 p-0">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link"
                                                        data-toggle="collapse"
                                                        data-target="#datasarana">
                                                    Data Sarana
                                                </button>
                                                <span class="badge badge-primary text-center
                                                rata_kanan">
                                                    @php
                                                    $a=$perumahan->r_sarana->count();
                                                    $b=$perumahan->r_foto_sarana->count();
                                                    $c=$perumahan->r_koordinat_saranas->count();
                                                    $total_data=$a+$b+$c;
                                                    echo "$total_data";
                                                    @endphp

                                                </span>
                                            </h5>
                                        </div>


                                        <div id="datasarana" class="collapse"
                                             data-parent="#accordion">
                                            <div class="card-body p-3">
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">Data Sarana
                                                    </legend>
                                                    <div class="control-group">
                                                        <a href="/saranas/{{ $perumahan->id }}">
                                                            Kelola Data Sarana</a><br>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">
                                                        Data Sarana
                                                    </legend>
                                                    <div class="control-group">
                                                        <label>Data Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_sarana->count()}}
                                                        </span><br>
                                                        <label>Data Foto Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_foto_sarana->count()}}
                                                        </span><br>
                                                        <label>Data Koordinat Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_koordinat_saranas->count()}}
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header bg-gray-200 p-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link"
                                                        data-toggle="collapse"
                                                        data-target="#datajalansaluran">
                                                    Data Jalan dan Saluran
                                                </button>
                                                <span class="badge badge-primary text-center
                                                rata_kanan">

                                                    @php
                                                    $a=$perumahan->r_jalan_saluran->count();
                                                    $b=$perumahan->r_foto_jalan_saluran->count();
                                                    $c=$perumahan->r_koordinat_jalan_saluran->count();
                                                    $total_data=$a+$b+$c;
                                                    echo "$total_data";
                                                    @endphp

                                                </span>
                                            </h5>
                                        </div>
                                        <div id="datajalansaluran" class="collapse"
                                             data-parent="#accordion">
                                            <div class="card-body p-3">
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">Data Jalan dan Saluran
                                                    </legend>
                                                    <div class="control-group">
                                                        <a href="/jalansalurans/{{ $perumahan->id}}">
                                                            Kelola Data Jalan dan Saluran</a><br>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">
                                                        Data Sarana
                                                    </legend>
                                                    <div class="control-group">
                                                        <label>Data Jalan Saluran </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_jalan_saluran->count()}}
                                                        </span><br>
                                                        <label>Data Foto Jalan dan Saluran </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_foto_jalan_saluran->count()}}
                                                        </span><br>
                                                        <label>Data Koordinat Jalan dan Saluran </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_koordinat_jalan_saluran->count()}}
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header bg-gray-200 p-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link"
                                                        data-toggle="collapse"
                                                        data-target="#datataman">
                                                    Data Taman
                                                </button>
                                                <span class="badge badge-primary text-center
                                                rata_kanan">
                                                {{$perumahan->r_taman->count()}}
                                                </span>
                                            </h5>
                                        </div>
                                        <div id="datataman" class="collapse"
                                             data-parent="#accordion">
                                            <div class="card-body p-3">
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">Data Sarana
                                                    </legend>
                                                    <div class="control-group">
                                                        <a href="/tamans/{{ $perumahan->id }}">
                                                            Kelola Data Taman</a><br>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">
                                                        Data Sarana
                                                    </legend>
                                                    <div class="control-group">
                                                        <label>Data Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_sarana->count()}}
                                                        </span><br>
                                                        <label>Data Foto Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_foto_sarana->count()}}
                                                        </span><br>
                                                        <label>Data Koordinat Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_koordinat_saranas->count()}}
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header bg-gray-200 p-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link"
                                                        data-toggle="collapse"
                                                        data-target="#datakoordinatperumahan">
                                                    Data Koordinat Perumahan
                                                </button>
                                                <span class="badge badge-primary text-center
                                                rata_kanan">
                                                {{$perumahan->r_koordinat_perumahan->count()}}
                                                </span>
                                            </h5>
                                        </div>
                                        <div id="datakoordinatperumahan" class="collapse"
                                             data-parent="#accordion">
                                            <div class="card-body p-3">
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">Data Sarana
                                                    </legend>
                                                    <div class="control-group">
                                                        <a href="/saranas/{{ $perumahan->id }}">
                                                            Kelola Data Sarana</a><br>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">
                                                        Data Sarana
                                                    </legend>
                                                    <div class="control-group">
                                                        <label>Data Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_sarana->count()}}
                                                        </span><br>
                                                        <label>Data Foto Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_foto_sarana->count()}}
                                                        </span><br>
                                                        <label>Data Koordinat Sarana </label>
                                                        <span class="badge badge-primary text-center
                                                              rata_kanan">
                                                            {{$perumahan->r_koordinat_saranas->count()}}
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header bg-gray-200 p-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link"
                                                        data-toggle="collapse"
                                                        data-target="#datacctv">
                                                    Data CCTV Perumahan
                                                </button>
                                                <span class="badge badge-primary text-center
                                                rata_kanan">
                                                {{$perumahan->r_cctv_perumahan->count()}}
                                                </span>
                                            </h5>
                                        </div>
                                        <div id="datacctv" class="collapse"
                                             data-parent="#accordion">
                                            <div class="card-body p-3">
                                                <fieldset class="data-border">
                                                    <legend class="legend-border">Data CCTV
                                                    </legend>
                                                    <div class="control-group">
                                                        <a href="">Input Data CCTV</a><br>
                                                        <a href="">Edit Data CCTV</a>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>
                        <td>{{ $perumahan->nama_pengembang }}</td>
                        <td>{{ $perumahan->luas_perumahan }}</td>
                        <td>{{ $perumahan->kecamatan }}</td>
                        <td>{{ $perumahan->kelurahan }}</td>
                        <td>{{ $perumahan->RT }}</td>
                        <td>{{ $perumahan->RW }}</td>
                        <td>
                            <a href="/users/edit" class="btn btn-primary
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                                <span class="text">Edit</span>
                            </a>

                            <button class="btn btn-dark btn-icon-split" data-toggle="modal"
                                    data-target="#confirm-delete" data-backdrop="static"
                                    data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                                <span class="text">Delete</span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


<!--            Legenda Perumahan     -->
            <h5 class="mt-3">Status Perumahan</h5>
            <div class="row">
                <div class="col-1">
                    <div class="bg-success kotak">
                    </div>
                </div>
                <div class="col-3">
                    <label><i>Status : Sudah Serah Terima</i></label>
                </div>

                <div class="col-1">
                    <div class="bg-warning kotak">

                    </div>
                </div>
                <div class="col-3">
                    <label><i>Status : Belum Serah Terima</i></label>
                </div>


                <div class="col-1">
                    <div class="bg-danger kotak">
                    </div>
                </div>
                <div class="col-3">
                    <label><i>Status : Terlantar</i></label>
                </div>
            </div>

<!--               Card Status Data                      -->
            <div class="row mt-3">
                <div class="col-xl-3 col-md-3 mb-3">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div
                                        class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Status : <br>Sudah Serah Terima
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        Total Data : {{$status_sudah}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-3 mb-3">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div
                                        class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Status : <br> Belum Serah Terima
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        Total Data : {{$status_belum}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-3 mb-3">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div
                                        class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Status : <br>Terlantar
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        Total Data : {{$status_terlantar}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-3 mb-3">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div
                                        class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Data Masuk
                                    </div>
                                    <div class="h2 mb-0 font-weight-bold text-gray-800 text-center">
                                        {{$perumahan->count()}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


<!--Pop Up Data Perumahan-->
@foreach( $perumahans as $perumahan )
<div class="modal fade" id="informasi-perumahan{{ $loop->iteration }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title">{{$perumahan->nama_perumahan}}</h4>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="popup-table-perumahan">
                    <tr>
                        <td>Nama Pengembang</td>
                        <td class="titik-dua">:</td>
                        <td width="300">{{$perumahan->nama_pengembang}}</td>
                        <td rowspan="9" width="300"><img src="../assets/images/cctv.png" alt="cctv"
                                                         class="cctv">
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
                                {{$perumahan->r_foto_sarana->count()}}</a>
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
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><br>
                            <textarea disabled class="form-control"
                                      style="background: none; border: none"
                                      rows="2">{{$perumahan->keterangan}}
                            </textarea>
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




<!--Modal Foto -->
@foreach( $perumahans as $perumahan )
<div class="modal" tabindex="-1" role="dialog" id="informasi-foto-perumahan{{ $loop->iteration }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-bold text-dark">
                <h5 class="modal-title">{{$perumahan->nama_perumahan}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row grid-divider">
                    @foreach( $perumahan->r_foto_sarana as $foto )
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

@foreach( $perumahans as $perumahan )
@foreach( $perumahan->r_foto_sarana as $foto )
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
