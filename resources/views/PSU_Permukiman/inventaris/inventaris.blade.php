@extends('layouts/main')

@section('title', 'Input Data Inventaris ( Permukiman )')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Inventaris :
                    {{$data_permukiman->nama_tpu}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$data_permukiman->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200">

        @if (session('status'))
        <div class="alert alert-success fade show" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="form-group">
            <form action="/inventaris/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="permukiman_id"
                               name="data_inventaris[0][permukiman_id]"
                               value="{{$data_permukiman->id}}">

                        <label for="nama_alat">Nama Alat</label><br>
                        <input type="text" class="form-control @error('data_inventaris.*.nama_alat') is-invalid
                            @enderror" id="nama_alat"
                               name="data_inventaris[0][nama_alat]"
                               placeholder="Masukan Nama Alat"
                               value="{{ old('data_inventaris.*.nama_alat') }}">
                        @error('data_inventaris.*.nama_alat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="jumlah">Jumlah</label><br>
                        <input type="number" class="form-control @error('data_inventaris.*.jumlah')
                                           is-invalid @enderror" id="jumlah"
                               name="data_inventaris[0][jumlah]"
                               placeholder="Masukan Jumlah"
                               value="{{ old('data_inventaris.*.jumlah') }}">
                        @error('data_inventaris.*.jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-12">
                        <label for="keterangan">Keterangan</label><br>
                        <textarea class="form-control @error('data_inventaris.*.keterangan') is-invalid
                                  @enderror" id="keterangan"
                                  name="data_inventaris[0][keterangan]"
                                  rows="3"
                                  placeholder="Masukan Deskripsi Keterangan">{{ old('data_pengelolah.*.keterangan')
                        }}</textarea>
                        @error('data_inventaris.*.keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4 mt-2">
                        <button type="button" class="btn btn-success btn-icon-split mr-2"
                                id="add_data_inventaris">
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



                <div id="inventaris-form"></div>


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
    @include('PSU_Permukiman.inventaris.tabel_inventaris')
</div>


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/permukiman/inventaris_form.js"></script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
