@extends('layouts/main')

@section('title', 'Input Data Koordinat ( Pertamanan )')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Koordinat</h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$koordinatPertamanan->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200 mb-5">
        <div class="form-group">
            <form action="/koordinatpertamanans/update/{{$koordinatPertamanan->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="pertamanan_id"
                               name="pertamanan_id"
                               value="{{$koordinatPertamanan->pertamanan_id}}">

                        <label for="longitude">Koordinat Longitude</label><br>
                        <input type="text" class="form-control @error('longitude')
                        is-invalid @enderror" id="longitude"
                               name="longitude"
                               placeholder="Masukan Koordinat Longitude"
                               value="{{$koordinatPertamanan->longitude}}">
                        @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="latitude">Koordinat Latitude</label><br>
                        <input type="text" class="form-control @error('latitude')
                                           is-invalid @enderror" id="latitude"
                               name="latitude"
                               placeholder="Masukan Koordinat Latitude"
                               value="{{$koordinatPertamanan->latitude}}">
                        @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4 mt-2">
                        <a href="/$koordinatPertamanan/{{$koordinatPertamanan->permukiman_id}}"
                           class="btn btn-info btn-icon-split mr-2"
                           id="btn_kembali">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </span>
                            <span class="text">Kembali</span>
                        </a>

                        <button type="submit" class="btn btn-primary btn-icon-split"
                                id="btn_submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                        </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

