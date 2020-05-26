@extends('layouts/main')

@section('title', 'Input Data Jalan Saluran Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="card shadow mb-4">
        <form method="post" action="/jalansalurans/update/{{$jalanSaluran->id}}">
            @method('patch')
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Edit Data Jalan dan Saluran :
                            {{$jalanSaluran->nama_jalan_saluran}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">
                            ID : {{$jalanSaluran->id}} || Perumahan ID :
                            {{$jalanSaluran->perumahan_id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body" id="data_jalansaluran">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$jalanSaluran->perumahan_id}}">

                        <label for="nama_jalansaluran">Nama Jalan Saluran</label><br>
                        <input type="text" class="form-control @error('nama_jalan_saluran')
                               is-invalid @enderror" id="nama_jalansaluran"
                               name="nama_jalan_saluran"
                               placeholder="Masukan Nama Jalan dan Saluran"
                               value="{{$jalanSaluran->nama_jalan_saluran}}">
                        @error('nama_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="luas_jalansaluran">Luas Jalan Saluran</label><br>
                        <input type="number" class="form-control @error('luas_jalan_saluran')
                                     is-invalid @enderror" id="luas_jalansaluran"
                               name="luas_jalan_saluran"
                               placeholder="Luas Jalan dan Saluran"
                               value="{{$jalanSaluran->luas_jalan_saluran}}">
                        @error('luas_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="kondisi_jalan_saluran">Kondisi Jalan Saluran</label><br>
                        <select
                            class="custom-select @error('kondisi_jalan_saluran')
                            is-invalid @enderror"
                            id="kondisi_jalan_saluran"
                            name="kondisi_jalan_saluran">
                            <option value="{{$jalanSaluran->kondisi_jalan_saluran}}"
                                    selected>{{$jalanSaluran->kondisi_jalan_saluran}}
                            </option>
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
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-icon-split m-3"
                    id="add_data_jalan_saluran">
                        <span class="icon text-white-50">
                             <i class="fas fa-download"></i>
                        </span>
                <span class="text">Simpan</span>
            </button>
        </form>
    </div>
</div>


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/perumahan/jalansaluran/jalansaluran_form
.js"></script>

@endsection
