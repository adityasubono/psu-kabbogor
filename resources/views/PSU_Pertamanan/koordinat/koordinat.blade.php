@extends('layouts/main')

@section('title', 'Input Data Koordinat ( Pertamanan )')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Koordinat :
                    {{$data_pertamanan->nama_taman}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$data_pertamanan->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200">
        <div class="form-group">
            @if (session('status'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form action="/koordinatpertamanans/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="permukiman_id"
                               name="data_koordinat[0][pertamanan_id]"
                               value="{{$data_pertamanan->id}}">

                        <label for="longitude">Koordinat Longitude</label><br>
                        <input type="text" class="form-control @error('data_koordinat.*.longitude')
                        is-invalid @enderror" id="longitude"
                               name="data_koordinat[0][longitude]"
                               placeholder="Masukan Koordinat Longitude"
                               value="{{ old('data_koordinat.*.longitude') }}">
                        @error('data_koordinat.*.longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="latitude">Koordinat Latitude</label><br>
                        <input type="text" class="form-control @error('data_koordinat.*.latitude')
                                           is-invalid @enderror" id="latitude"
                               name="data_koordinat[0][latitude]"
                               placeholder="Masukan Koordinat Latitude"
                               value="{{ old('data_koordinat.*.latitude') }}">
                        @error('data_koordinat.*.latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4 mt-2">
                        <button type="button" class="btn btn-success btn-icon-split mr-2"
                                id="add_data_koordinat">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                            <span class="text">Tambah</span>
                        </button>

                        <button type="button" class="btn btn-info btn-icon-split"
                                id="btn-reset-form">
                        <span class="icon text-white-50">
                            <i class="fas fa-sync"></i>
                        </span>
                            <span class="text">Reset</span>
                        </button>
                        <input type="hidden" id="jumlah-form" value="0">
                    </div>
                </div>



                <div id="koordinat_form"></div>


                <button type="submit" class="btn btn-primary btn-icon-split mt-3"
                        id="submit_pengelolah">
                        <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                        </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>
    @include('PSU_Pertamanan.koordinat.tabel_koordinat_taman')
</div>


<!--Scrpit Data Koordinat Form -->
<script type="text/javascript" src="../assets/js/pertamanan/koordinat_pertamanan_form.js"></script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection
