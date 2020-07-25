@extends('layouts/main')

@section('title', 'Informasi Detail Pengelolah')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Detail Data Pengelolah : {{$pengelolah->nama}}</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">ID
                        : {{$pengelolah->id}}</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="/pengelolas/update/{{$pengelolah->id}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="permukiman_id"
                                   name="permukiman_id"
                                   value="{{$pengelolah->permukiman_id}}">

                            <label for="nama">Nama Pengelolah</label><br>
                            <input type="text" class="form-control @error('nama') is-invalid
                                     @enderror" id="nama"
                                   name="nama"
                                   placeholder="Masukan Nama Pengelola"
                                   value="{{$pengelolah->nama}}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label for="umur">Umur</label><br>
                            <input type="number" class="form-control @error('umur')
                                     is-invalid @enderror" id="umur"
                                   name="umur"
                                   placeholder="Masukan Umur"
                                   value="{{$pengelolah->umur}}">
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
                                <option value="{{$pengelolah->pendidikan}}" selected>
                                    {{$pengelolah->pendidikan}}
                                </option>
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
                            <textarea class="form-control @error('tugas') is-invalid @enderror"
                                      id="tugas"
                                      name="tugas"
                                      rows="3"
                                      placeholder="Masukan Deskripsi Tugas">{{
                            $pengelolah->tugas}}</textarea>
                            @error('tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mt-2">
                            <label for="keterangan">Keterangan</label><br>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                      id="keterangan"
                                      name="keterangan"
                                      rows="3"
                                      placeholder="Masukan Deskripsi Keterangan">{{$pengelolah->keterangan}}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-4 mt-2">
                            <a href="/pengelolas/{{$pengelolah->permukiman_id}}"
                               class="btn btn-info btn-icon-split mr-2"
                               id="btn_kembali">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-alt-circle-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button type="submit" class="btn btn-primary btn-icon-split"
                                    id="btn_submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
