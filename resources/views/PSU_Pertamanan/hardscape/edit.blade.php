@extends('layouts/main')

@section('title', 'Edit Data hardscape ( Pertamanan )')

@section('container-fluid')
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Hardscape :
                    <b class="text-dark">{{$hardscape->nama_alat}}</b>
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$hardscape->id}}
                </h6>
            </div>
        </div>
    </div>

    <div class="card-body bg-gray-200">
        <form action="/hardscapes/update/{{$hardscape->id}}" method="post">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-sm-3">

                    <input type="hidden" class="form-control" id="pertamanan_id"
                           name="pertamanan_id"
                           value="{{$hardscape->pertamanan_id}}">

                    <label for="nama_alat">Nama Alat </label><br>
                    <input type="text" class="form-control @error('nama_alat') is-invalid
                            @enderror" id="nama_alat"
                           name="nama_alat"
                           placeholder="Masukan Nama Alat"
                           value="{{$hardscape->nama_alat}}">
                    @error('nama_alat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label for="merk">Merek / Tipe</label><br>
                    <input type="text" class="form-control @error('tipe')
                           is-invalid @enderror"
                           id="merk"
                           name="tipe"
                           placeholder="Masukan Merk / Tipe"
                           value="{{$hardscape->tipe}}">
                    @error('tipe')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="tahun_perolehan">Tahun Perolehan</label><br>
                    <select
                        class="custom-select @error('tahun_perolehan')
                        is-invalid @enderror"
                        id="tahun_perolehan" name="tahun_perolehan">
                        <option value="{{$hardscape->tahun_perolehan}}"
                                selected>
                            {{$hardscape->tahun_perolehan}}
                        </option>
                        @php
                        $tahun=getdate();
                        @endphp
                        @for($i = $tahun['year']; $i >= 2010; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    @error('tahun_perolehan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="kondisi">Kondisi</label><br>
                    <select
                        class="custom-select @error('kondisi') is-invalid
                        @enderror"
                        id="kondisi" name="kondisi">
                        <option value="{{$hardscape->kondisi}}" selected>
                            {{$hardscape->kondisi}}
                        </option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-2">
                    <label for="keterangan">Keterangan</label><br>
                    <textarea class="form-control @error('keterangan')
                              is-invalid @enderror" id="keterangan"
                              name="keterangan"
                              rows="3"
                              placeholder="Masukan Deskripsi Keterangan">{{
                              $hardscape->keterangan}}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-4 mt-2">
                    <a href="/hardscapes/{{$hardscape->pertamanan_id}}"
                       class="btn btn-info btn-icon-split mr-2"
                       id="add_data_pemeliharaan">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>

                    <button type="submit" class="btn btn-primary btn-icon-split"
                            id="btn_simpan">
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
@endsection

