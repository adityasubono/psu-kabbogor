@extends('layouts/main')

@section('title', 'Input Data Pertamanan')

@section('container-fluid')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Pertamanan</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        @foreach( $pertamanan_id as $id )
                        @php
                        $id_plus= $id->id + 1;
                        echo "ID: $id_plus";
                        @endphp
                        @endforeach
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/pertamanans">
                @csrf
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama_perumahan">Nama Taman</label><br>
                            <input type="text" class="form-control @error('nama_taman') is-invalid
                                   @enderror"
                                   id="nama_taman"
                                   name="nama_taman"
                                   placeholder="Masukan Nama Taman"
                                   value="{{ old('nama_taman') }}">

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
                                   value="{{ old('nama_pelaksana') }}">

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
                                   value="{{ old('luas_taman') }}">

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
                                id="tahun_dibangun" name="tahun_dibangun"
                                value="{{ old('tahun_dibangun') }}">
                                <option value="">--Pilih Tahun Dibangun--</option>
                                @php
                                $tahun=getdate();
                                @endphp
                                @for($i = $tahun['year']; $i >= 2000; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
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
                                      placeholder="Masukan Alamat Lokasi">{{ old('lokasi') }}</textarea>
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
                                id="kecamatan" name="kecamatan"
                                value="{{ old('kecamatan') }}">
                                <option value="">--Pilih Kecamatan--</option>
                                @foreach( $kecamatans as $kecamatan )
                                <option value="{{ $kecamatan->nama_kecamatan }}">
                                    {{ $kecamatan->nama_kecamatan }}
                                </option>
                                @endforeach
                            </select>
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
                                <option value="">--Pilih Kelurahan--</option>
                            </select>
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
                                   value="{{ old('RW') }}">
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
                                   value="{{ old('RT') }}">
                            @error('RT')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                @include('PSU_Pertamanan.petugas.petugas')

                @include('PSU_Pertamanan.pemeliharaan.pemeliharaan')

                @include('PSU_Pertamanan.hardscape.hardscape')

                @include('PSU_Pertamanan.softscape.softscape')

                @include('PSU_Pertamanan.koordinat.koordinat')

                @include('PSU_Pertamanan.cctv.cctv')

                @include('PSU_Pertamanan.foto.foto')


                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid
                              @enderror" id="keterangan" name="keterangan" rows="3"
                              placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                    <span class="text">Submit</span>
                </button>

                <button type="reset" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-sync"></i>
                            </span>
                    <span class="text">Reset</span>
                </button>
            </form>
        </div>
    </div>
</div>


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/getKelurahan.js"></script>

<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/sarana_form.js"></script>



@endsection
