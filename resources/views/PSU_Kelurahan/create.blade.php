@extends('layouts.main')

@section('title', 'Input Data User')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Kelurahan</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/kelurahans">
                @csrf

                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <label for="nik">Pilih Nama Kecamatan</label>
                            <select
                                class="custom-select"
                                id="kecamatan_id" name="data_kelurahan[0][kecamatan_id]"
                                value="{{ old('nama_kecamatan') }}"
                                onchange="myFunction()">
                                <option value="">--Pilih Nama Kecamatan--</option>
                                @foreach( $kecamatans as $kecamatan )
                                <option
                                    value="{{$kecamatan->id}}"
                                    selected="selected">
                                    {{$kecamatan->nama_kecamatan}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row" id="data_kelurahan">
                        <div class="col-sm-4">
                            <label for="nama_kelurahan">Nama Kelurahan</label>
                            <input type="text" class="form-control @error('data_kelurahan[0][nama_kelurahan]') is-invalid
                                         @enderror"
                                   id="nama"
                                   name="data_kelurahan[0][nama_kelurahan]"
                                   placeholder="Masukan Nama Kelurahan"
                                   value="{{ old('nama_kelurahan') }}">

<!--                            <input type="text" class="form-control-->
<!--                                   @error('nama') is-invalid @enderror"-->
<!--                                   id="kecamatan_id"-->
<!--                                   name="data_kelurahan[0][kecamatan_id]"-->
<!--                                   placeholder="Kecamatan ID"-->
<!--                                   value="{{ old('kecamatan_id') }}">-->


                            @error('nama_kelurahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="aksi">Aksi</label><br>
                            <button type="button" class="btn btn-success btn-icon-split"
                                    id="add_data_kelurahan">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-plus"></i>
                                    </span>
                                <span class="text">Tambah</span>
                            </button>
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
