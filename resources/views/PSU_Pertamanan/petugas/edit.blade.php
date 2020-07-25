@extends('layouts/main')

@section('title', 'Halaman Kelola Data Petugas (Pertamanan)')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Petugas :
                    {{$petugas->nama}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$petugas->id}}
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
            <form action="/petugas/update/{{$petugas->id}}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="pertamanan_id"
                                   name="pertamanan_id"
                                   value="{{$petugas->pertamanan_id}}">
                            <label for="nama">Nama </label><br>
                            <input type="text" class="form-control @error('nama') is-invalid
                                   @enderror" id="nama"
                                   name="nama"
                                   placeholder="Masukan Nama Petugas"
                                   value="{{$petugas->nama}}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label for="luas_sarana">Umur</label><br>
                            <input type="number" class="form-control @error('umur')
                                   is-invalid @enderror" id="umur"
                                   name="umur"
                                   placeholder="Masukan Umur"
                                   value="{{$petugas->umur}}">
                            @error('umur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="pendidikan">Pendidikan</label><br>
                            <select
                                class="custom-select @error('pendidikan') is-invalid @enderror"
                                id="pendidikan"
                                name="pendidikan">
                                <option value="{{$petugas->pendidikan}}" selected>
                                    {{$petugas->pendidikan}}</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                            </select>
                            @error('pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mt-2">
                            <label for="tugas">Tugas</label><br>
                            <textarea class="form-control @error('tugas') is-invalid
                                      @enderror" id="tugas"
                                      name="tugas"
                                      rows="3"
                                      placeholder="Masukan Deskripsi Tugas">{{
                                $petugas->tugas}}</textarea>
                            @error('tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mt-2">
                            <label for="keterangan_tugas">Keterangan</label><br>
                            <textarea class="form-control
                                      @error('keterangan_tugas') is-invalid
                                      @enderror" id="keterangan_tugas"
                                      name="keterangan_tugas"
                                      rows="3"
                                      placeholder="Masukan DeskripsiKeterangan">{{
                                $petugas->keterangan_tugas}}</textarea>
                            @error('keterangan_tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row pl-3 pr-3">
                    <div id="petugas-form"></div>
                </div>

                <button type="submit" class="btn btn-primary btn-icon-split mr-2" id="btn_simpan">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>

    <a href="/petugas/{{$petugas->pertamanan_id}}" class="btn btn-info btn-icon-split mt-3 mb-3"
       id="add_data_petugas">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
</div>



@endsection


