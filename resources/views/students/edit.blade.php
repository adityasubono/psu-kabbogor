@extends('layouts/main')

@section('title', 'Edit Students')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Edit Students</h1>

            <form method="post" action="/students/{{ $student->id }}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                           id="nama"
                           placeholder="Nama"
                           name="nama" value="{{ $student->nama }}">
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
                           name="nrp"  value="{{ $student->nrp }}">
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
                           name="email"  value="{{ $student->email }}">
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
                           name="jurusan"  value="{{ $student->jurusan }}">
                    @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>
@endsection
