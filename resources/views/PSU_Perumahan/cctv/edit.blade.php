@extends('layouts/main')

@section('title', 'Edit Data CCTV Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data CCTV Perumahan :
                    {{$cCTVPerumahan->nama_cctv}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$cCTVPerumahan->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200">

        <div class="form-group">
            <form action="/cctvperumahans/update/{{$cCTVPerumahan->id}}" method="post">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$cCTVPerumahan->perumahan_id}}">

                        <label for="nama_cctv">Nama CCTV</label><br>
                        <input type="text" class="form-control @error('nama_cctv')
                        is-invalid @enderror" id="nama_cctv"
                               name="nama_cctv"
                               placeholder="Masukan Nama CCTV"
                               value="{{$cCTVPerumahan->nama_cctv}}">
                        @error('nama_cctv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="ip_cctv">IP CCTV</label><br>
                        <input type="text" class="form-control @error('ip_cctv')
                                           is-invalid @enderror" id="ip_cctv"
                               name="ip_cctv"
                               placeholder="Masukan IP CCTV"
                               value="{{$cCTVPerumahan->ip_cctv}}">
                        @error('ip_cctv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


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
</div>

@endsection
