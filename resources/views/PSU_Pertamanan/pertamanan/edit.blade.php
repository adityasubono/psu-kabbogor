@extends('layouts/main')

@section('title', 'Input Data Pertamanan')

@section('container-fluid')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pertamanan
                    : {{$pertamanan->nama_taman}}</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        ID : {{$pertamanan->id}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/pertamanans/update/{{$pertamanan->id}}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama_taman">Nama Taman</label><br>
                            <input type="text" class="form-control
                                   @error('nama_taman') is-invalid @enderror"
                                   id="nama_taman"
                                   name="nama_taman"
                                   placeholder="Masukan Nama Taman"
                                   value="{{$pertamanan->nama_taman}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('nama_taman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label for="nama_pelaksana">Nama Perlaksana</label><br>
                            <input type="text" class="form-control @error('nama_pelaksana') is-invalid
                                   @enderror"
                                   id="nama_pelaksana"
                                   name="nama_pelaksana"
                                   placeholder="Masukan Nama Pelaksana"
                                   value="{{$pertamanan->nama_pelaksana}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('nama_pelaksana')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="luas_taman">Luas Taman (m2)</label><br>
                            <input type="number" class="form-control @error('luas_taman')
                                   is-invalid @enderror"
                                   id="luas_taman"
                                   name="luas_taman"
                                   placeholder="Masukan Luas Taman"
                                   value="{{$pertamanan->luas_taman}}">

                            @error('luas_taman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="tahun_dibangun">Tahun Dibangun</label><br>
                            <select
                                class="custom-select @error('tahun_dibangun') is-invalid @enderror"
                                id="tahun_dibangun" name="tahun_dibangun">
                                <option value="{{$pertamanan->tahun_dibangun}}"selected>
                                    {{$pertamanan->tahun_dibangun}}</option>
                                @php
                                $tahun=getdate();
                                @endphp
                                @for($i = $tahun['year']; $i >= 2000; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('tahun_dibangun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="lokasi">Alamat Lokasi</label><br>
                            <textarea class="form-control @error('lokasi') is-invalid
                                      @enderror" id="lokasi" name="lokasi" rows="3"
                                      placeholder="Masukan Alamat Lokasi">{{$pertamanan->lokasi}}</textarea>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="kecamatan">Kecamatan</label><br>
                            <select
                                class="custom-select @error('kecamatan') is-invalid @enderror"
                                id="kecamatan" name="kecamatan">
                                <option value="{{$pertamanan->kecamatan}}" selected>
                                    {{$pertamanan->kecamatan}}</option>
                                @foreach( $kecamatans as $kecamatan )
                                <option value="{{ $kecamatan->nama_kecamatan }}">
                                    {{ $kecamatan->nama_kecamatan }}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="kelurahan">Kelurahan</label><br>
                            <select
                                class="custom-select @error('kelurahan') is-invalid @enderror"
                                id="kelurahan" name="kelurahan"
                                value="{{ old('kelurahan') }}">
                                <option value="{{$pertamanan->kelurahan}}" selected>
                                    {{$pertamanan->kelurahan}}</option>
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('kelurahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="RT">RT</label><br>
                            <input type="text" class="form-control
                            @error('RW') is-invalid @enderror"
                                   id="RW"
                                   name="RW"
                                   placeholder="RW"
                                   value="{{$pertamanan->RT}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('RW')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="RW">RW</label><br>
                            <input type="text" class="form-control
                            @error('RT') is-invalid @enderror"
                                   id="RT"
                                   name="RT"
                                   placeholder="RT"
                                   value="{{$pertamanan->RT}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('RT')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid
                              @enderror" id="keterangan" name="keterangan" rows="3"
                              placeholder="Masukan Keterangan">{{$pertamanan->keterangan}}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <a href="/pertamanans" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </span>
                    <span class="text">Kembali</span>
                </a>

                <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                    <span class="text">Simpan</span>
                </button>


            </form>
        </div>
    </div>
</div>


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../../assets/js/getKelurahan.js"></script>


@endsection
