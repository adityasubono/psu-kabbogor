@extends('layouts.main')

@section('title', 'Add Students')

@section('container-fluid')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Add Students</h1>

            <form method="post" action="/students">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                           id="nama"
                           placeholder="Nama"
                           name="nama" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="number" class="form-control @error('nrp') is-invalid
                        @enderror" id="NRP" placeholder="NRP"
                           name="nrp" value="{{ old('nrp') }}">
                    @error('nrp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid
                        @enderror" id="email" placeholder="Email"
                           name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid
                        @enderror" id="nama" placeholder="Jurusan"
                           name="jurusan" value="{{ old('jurusan') }}">
                    @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Insert Data</button>
            </form>
        </div>
    </div>
</div>
@endsection
