@extends('layouts.main')

@section('title', 'Input Data User')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Kecamatan</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/kecamatans">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nik">Nama Kecamatan</label>
                            <input type="text" class="form-control @error('nama_kecamatan') is-invalid
                                   @enderror" id="nama_kecamatan" name="nama_kecamatan"
                                   placeholder="Masukan Nama Kecamatan"
                                   value="{{ old('nama_kecamatan') }}">
                            @error('nama_kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                    <span class="text">Submit</span>
                </button>

                <button type="reset" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-sync"></i>
                            </span>
                    <span class="text">Reset</span>
                </button>
            </form>
        </div>
    </div>
</div>
<!--Script Data CCTV-->
<script type="text/javascript" src="../assets/js/kelurahan_form.js"></script>

@endsection
