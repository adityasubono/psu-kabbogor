@extends('layouts/main')

@section('title', 'Informasi Detail Pengelolah')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Inventaris :
                    {{$inventaris->nama_alat}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$inventaris->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200 mb-5">
        <div class="form-group">
            <form action="/inventaris/update/{{$inventaris->id}}" method="post">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="permukiman_id"
                               name="permukiman_id"
                               value="{{$inventaris->permukiman_id}}">

                        <label for="nama_alat">Nama Alat</label><br>
                        <input type="text" class="form-control @error('nama_alat') is-invalid
                               @enderror" id="nama_alat"
                               name="nama_alat"
                               placeholder="Masukan Nama Alat"
                               value=" {{$inventaris->nama_alat}}">
                        @error('nama_alat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="jumlah">Jumlah</label><br>
                        <input type="text" class="form-control @error('jumlah')
                                     is-invalid @enderror" id="jumlah"
                               name="jumlah"
                               placeholder="Masukan Jumlah"
                               value=" {{$inventaris->jumlah}}">
                        @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-12">
                        <label for="keterangan">Keterangan</label><br>
                        <textarea class="form-control @error('keterangan') is-invalid
                                  @enderror" id="keterangan"
                                  name="keterangan"
                                  rows="3"
                                  placeholder="Masukan Deskripsi
                                  Keterangan">{{$inventaris->keterangan}}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4 mt-2">

                        <a href="/inventaris/{{$inventaris->id}}"
                           class="btn btn-info btn-icon-split" id="btn-reset-form">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </span>
                            <span class="text">Kembali</span>
                        </a>

                        <button type="submit" class="btn btn-primary btn-icon-split mr-2"
                                id="add_data_inventaris">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
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
