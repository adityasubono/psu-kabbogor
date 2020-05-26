@extends('layouts/main')

@section('title', 'Edit Data Taman Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="card shadow mb-4">
        <form method="post" action="/tamans/update/{{$taman->id}}">
            @method('patch')
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Taman :
                            {{$taman->nama_taman}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">
                            ID : {{$taman->id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body bg-gray-200" id="data_sarana">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$taman->perumahan_id}}">

                        <label for="nama_taman">Nama Taman</label><br>
                        <input type="text" class="form-control @error('nama_taman') is-invalid
                                           @enderror" id="nama_taman"
                               name="nama_taman"
                               placeholder="Masukan Nama Taman"
                               value="{{$taman->nama_taman }}">
                        @error('nama_taman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="luas_taman">Luas Taman</label><br>
                        <input type="number" class="form-control @error('luas_taman')
                                           is-invalid @enderror" id="luas_taman"
                               name="luas_taman"
                               placeholder="Luas Taman"
                               value="{{$taman->luas_taman}}">
                        @error('luas_taman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="kondisi_taman">Kondisi Taman</label><br>
                        <select
                            class="custom-select @error('kondisi_taman') is-invalid @enderror"
                            id="kondisi_sarana"
                            name="kondisi_taman">
                            <option value="{{$taman->kondisi_taman}}" selected>
                                {{$taman->kondisi_taman}}
                            </option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                        @error('kondisi_taman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-icon-split mt-3"
                        id="btn_simpan">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                    <span class="text">Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
