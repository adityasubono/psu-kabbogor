@extends('layouts/main')

@section('title', 'Edit Data CCTV Permukiman')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Update Data CCTV</h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$cCTVPermukiman->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200 mb-5">
        <div class="form-group">
            <form action="/cctvtpus/update/{{$cCTVPermukiman->id}}" method="post">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="permukiman_id"
                               name="permukiman_id"
                               value="{{$cCTVPermukiman->permukiman_id}}">

                        <label for="nama_cctv">Nama CCTV</label><br>
                        <input type="text" class="form-control @error('nama_cctv')
                        is-invalid @enderror" id="nama_cctv"
                               name="nama_cctv"
                               placeholder="Masukan Nama CCTV"
                               value="{{$cCTVPermukiman->nama_cctv}}">
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
                               value="{{ $cCTVPermukiman->ip_cctv }}">
                        @error('ip_cctv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4 mt-2">
                        <a  href="/cctvtpus/{{$cCTVPermukiman->permukiman_id}}" class="btn btn-info
                            btn-icon-split mr-2" id="btn_kembali">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </span>
                            <span class="text">Kembali</span>
                        </a>

                        <button type="submit" class="btn btn-primary btn-icon-split"
                                id="btn_simpan">
                        <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                        </span>
                            <span class="text">Simpan</span>
                        </button>
                        <input type="hidden" id="jumlah-form" value="0">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Scrpit Data CCTV Form -->
<script type="text/javascript" src="../assets/js/permukiman/cctv_form.js"></script>

@endsection
