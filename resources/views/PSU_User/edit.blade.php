@extends('layouts.main')

@section('title', 'Input Data User')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data User</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/users/update/{{ $user->id }}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control @error('nik') is-invalid
                        @enderror" id="nik" name="nik"
                           placeholder="Masukan NIK"  value="{{  $user->nik }}">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid
                        @enderror" id="nama" name="nama"
                           placeholder="Masukan Nama"  value="{{ $user->nama }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid
                        @enderror" id="email" name="email"
                           placeholder="Masukan Email"  value="{{ $user->email }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid
                    @enderror" id="password" name="password"
                           aria-describedby="emailHelp" placeholder="Masukan Password"
                           value="{{ $user->password}}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="operator">Operator</label>
                    <select class="custom-select @error('operator') is-invalid @enderror"
                            id="operator" name="operator"
                            value="{{ $user->operator }}">
                        <option value="{{ $user->operator }}"selected>{{ $user->operator }}</option>
                        <option value="PSU-Admin">Admin</option>
                        <option value="PSU-Perumahan">Operator PSU Perumahan</option>
                        <option value="PSU-Pertamanan">Operator PSU Pertamanan</option>
                        <option value="PSU-Permukiman">Operator PSU Kawasan Permukiman</option>
                    </select>
                    @error('operator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


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
