@extends('layouts/main')

@section('title', 'Halaman Kelola Data Petugas (Pertamanan)')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Petugas :
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

        @if (session('status'))
        <div class="alert alert-success fade show" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="form-group">
            <form action="/petugas/store" method="post">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="pertamanan_id"
                                   name="data_petugas[0][pertamanan_id]"
                                   value="{{$data_pertamanan->id}}">
                            <label for="nama">Nama </label><br>
                            <input type="text" class="form-control @error('data_petugas.*.nama') is-invalid
                                   @enderror" id="nama"
                                   name="data_petugas[0][nama]"
                                   placeholder="Masukan Nama Petugas"
                                   value="{{ old('data_petugas.*.nama') }}">
                            @error('data_petugas.*.nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label for="luas_sarana">Umur</label><br>
                            <input type="number" class="form-control @error('data_petugas.*.umur')
                                   is-invalid @enderror" id="umur"
                                   name="data_petugas[0][umur]"
                                   placeholder="Masukan Umur"
                                   value="{{ old('data_petugas.*.umur') }}">
                            @error('data_petugas.*.umur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="pendidikan">Pendidikan</label><br>
                            <select
                                class="custom-select @error('data_petugas.*.pendidikan') is-invalid @enderror"
                                id="pendidikan"
                                name="data_petugas[0][pendidikan]"
                                value="{{ old('data_petugas.*.pendidikan') }}">
                                <option value="">--Pilih Pendidikan--</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                            </select>
                            @error('data_petugas.*.pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mt-2">
                            <label for="tugas">Tugas</label><br>
                            <textarea class="form-control @error('data_petugas.*.tugas') is-invalid
                              @enderror" id="tugas"
                                      name="data_petugas[0][tugas]"
                                      rows="3"
                                      placeholder="Masukan Deskripsi Tugas">{{
                            old('data_petugas.*.tugas') }}</textarea>
                            @error('data_petugas.*.tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mt-2">
                            <label for="keterangan_tugas">Keterangan</label><br>
                            <textarea class="form-control
                                      @error('data_petugas.*.keterangan_tugas') is-invalid
                                      @enderror" id="keterangan_tugas"
                                      name="data_petugas[0][keterangan_tugas]"
                                      rows="3"
                                      placeholder="Masukan Deskripsi Keterangan">{{ old('data_petugas.*.keterangan_tugas')
                        }}</textarea>
                            @error('data_petugas.*.keterangan_tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-4 mt-2">
                            <button type="button" class="btn btn-success btn-icon-split mr-2"
                                    id="add_data_petugas">
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
                </div>

                <div class="row pl-3 pr-3">
                    <div id="petugas-form"></div>
                </div>

                <button type="submit" class="btn btn-primary btn-icon-split mr-2"
                        id="btn_simpan">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>

    @include('PSU_Pertamanan.petugas.tabel_petugas')

    <a href="/pertamanans" class="btn btn-info btn-icon-split mt-3 mb-3"
       id="add_data_petugas">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
</div>

<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/pertamanan/petugas_form.js"></script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection


