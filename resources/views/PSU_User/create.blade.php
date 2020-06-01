@extends('layouts.main')

@section('title', 'Input Data User')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data User</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/users/store" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control @error('nik') is-invalid
                        @enderror" id="nik" name="nik"
                               placeholder="Masukan NIK" value="{{ old('nik') }}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="col-sm-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid
                        @enderror" id="nama" name="nama"
                               placeholder="Masukan Nama" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid
                        @enderror" id="email" name="email"
                               placeholder="Masukan Email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid
                               @enderror" id="password" name="password"
                               aria-describedby="emailHelp" placeholder="Masukan Password" value="{{
                            old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="file_foto">Upload Foto</label><br>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file_foto"
                                       id="file_foto"
                                       class="custom-file-input @error('file_foto') is-invalid @enderror">
                                <label class="custom-file-label">Pilih
                                    File Foto....</label>
                                @error('file_foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <label for="operator">Operator</label>
                        <select class="custom-select @error('operator') is-invalid @enderror"
                                id="operator" name="operator"
                                value="{{ old('operator') }}">
                            <option value="">--Pilih Operator--</option>
                            @foreach($rules as $rule)
                            <option value="{{$rule->id}}">{{$rule->nama_rule}}</option>
                            @endforeach
                        </select>
                        @error('operator')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <a href="/users" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>

                <button class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
