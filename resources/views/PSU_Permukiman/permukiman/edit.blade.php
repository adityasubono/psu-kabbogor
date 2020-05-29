@extends('layouts/main')

@section('title', 'Edit Data Permukiman')

@section('container-fluid')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Edit Data Permukiman :  {{$permukiman->nama_tpu}}</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        ID : {{$permukiman->id}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/permukimans/{{$permukiman->id}}">
                {{ method_field('PATCH') }}
                @csrf
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="nama_tpu">Nama TPU</label><br>
                            <input type="text" class="form-control @error('nama_tpu') is-invalid
                                   @enderror"
                                   id="nama_tpu"
                                   name="nama_tpu"
                                   placeholder="Masukan Nama TPU"
                                   value="{{$permukiman->nama_tpu}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>

                            @error('nama_tpu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="luas_tpu">Luas TPU (m2)</label><br>
                            <input type="number" class="form-control @error('luas_tpu') is-invalid
                                   @enderror"
                                   id="luas_tpu"
                                   name="luas_tpu"
                                   placeholder="Masukan Luas TPU"
                                   value="{{$permukiman->luas_tpu}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('luas_tpu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="daya_tampung">Daya Tampung</label><br>
                            <input type="number" class="form-control @error('daya_tampung')
                                   is-invalid @enderror"
                                   id="daya_tampung"
                                   name="daya_tampung"
                                   placeholder="Masukan Daya Tampung"
                                   value="{{$permukiman->daya_tampung}}">

                            @error('daya_tampung')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="tahun_digunakan">Tahun Dibangun</label><br>
                            <select
                                class="custom-select @error('tahun_digunakan') is-invalid @enderror"
                                id="tahun_dibangun" name="tahun_digunakan">
                                <option value="">--Pilih Tahun Digunakan--</option>
                                <option value="{{$permukiman->tahun_digunakan}}" selected>
                                    {{$permukiman->tahun_digunakan}}</option>
                                @php
                                $tahun=getdate();
                                @endphp
                                @for($i = $tahun['year']; $i >= 1900; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('tahun_digunakan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-12 mt-2">
                            <label for="lokasi">Alamat Lokasi</label><br>
                            <textarea class="form-control @error('lokasi') is-invalid
                                      @enderror" id="lokasi" name="lokasi" rows="3"
                                      placeholder="Masukan Alamat Lokasi">{{
                                $permukiman->lokasi}}</textarea>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="col-sm-3 mt-2">
                            <label for="kecamatan">Kecamatan</label><br>
                            <select
                                class="custom-select @error('kecamatan') is-invalid @enderror"
                                id="kecamatan" name="kecamatan"
                                value="{{ old('kecamatan') }}">
                                <option value="{{ $permukiman->kecamatan }}" selected>
                                    {{ $permukiman->kecamatan }}
                                </option>
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

                        <div class="col-sm-3 mt-2">
                            <label for="kelurahan">Kelurahan</label><br>
                            <select
                                class="custom-select @error('kelurahan') is-invalid @enderror"
                                id="kelurahan" name="kelurahan">
                                <option value="{{ $permukiman->kelurahan }}" selected>
                                    {{ $permukiman->kelurahan }}
                                </option>
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('kelurahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3 mt-2">
                            <label for="RT">RT</label><br>
                            <input type="text" class="form-control
                            @error('RW') is-invalid @enderror"
                                   id="RW"
                                   name="RW"
                                   placeholder="RW"
                                   value="{{$permukiman->RW}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('RW')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3 mt-2">
                            <label for="RW">RW</label><br>
                            <input type="text" class="form-control
                            @error('RT') is-invalid @enderror"
                                   id="RT"
                                   name="RT"
                                   placeholder="RT"
                                   value="{{$permukiman->RT}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('RT')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3 mt-2">
                            <label for="status">Status</label>
                            <select
                                class="custom-select @error('status') is-invalid @enderror"
                                id="status" name="status"
                                onchange="displayForm(this)">
                                <option value="{{$permukiman->status}}"
                                        selected>{{$permukiman->status}}</option>
                                <option value="Sudah Beroperasional">Sudah Beroperasonal</option>
                                <option value="Belum Beroperasional">Belum Beroperasonal</option>
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="col-sm-3 mt-2">
                            <div id="kondisi_0">
                                <label for="kondisi">Kondisi</label>
                                <select
                                    class="custom-select @error('kondisi') is-invalid @enderror"
                                    id="kondisi" name="kondisi"
                                    value="{{ old('kondisi') }}">
                                    <option value="{{$permukiman->kondisi}}"
                                            selected>{{$permukiman->kondisi}}
                                    </option>
                                    <optgroup label="Sudah Beroperasional"
                                              style="display: none" id="kondisi_1">
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </optgroup>
                                    <optgroup label="Belum Beroperasional"
                                              style="display: none" id="kondisi_2">
                                        <option value="Kondisi Tertata">Kondisi Tertata</option>
                                        <option value="Kondisi Belum Tertata">Kondisi Belum Tertata
                                        </option>
                                    </optgroup>
                                </select>
                                @error('kondisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6 mt-2">
                            <div id="keterangan_sts">
                                <label for="keterangan_status">Keterangan Status</label>
                                <textarea class="form-control @error('keterangan_status') is-invalid
                              @enderror" id="keterangan_status" name="keterangan_status" rows="3"
                                          placeholder="Masukan Keterangan Status">{{
                                $permukiman->keterangan_status}}</textarea>
                                @error('keterangan_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-12 mt-2">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid
                              @enderror" id="keterangan" name="keterangan" rows="3"
                                      placeholder="Masukan Keterangan">{{ $permukiman->keterangan}}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                        <span class="text">Simpan</span>
                    </button>

                    <a href="/permukimans" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-times-circle"></i>
                            </span>
                        <span class="text">Batal</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../../assets/js/getKelurahan.js"></script>

<script type="text/javascript">
    function displayForm(elem) {
        if (elem.value === "0") {
            document.getElementById('kondisi_0').style.display = "none";
            document.getElementById('kondisi_1').style.display = "none";
            document.getElementById('kondisi_2').style.display = "none";
            document.getElementById('keterangan_sts').style.display = "none";
        } else if (elem.value === "Belum Beroperasional") {
            document.getElementById('kondisi_0').style.display = "block";
            document.getElementById('kondisi_1').style.display = "none";
            document.getElementById('kondisi_2').style.display = "block";
            document.getElementById('keterangan_sts').style.display = "block";
        } else if (elem.value === "Sudah Beroperasional") {
            document.getElementById('kondisi_0').style.display = "block";
            document.getElementById('kondisi_1').style.display = "block";
            document.getElementById('kondisi_2').style.display = "none";
            document.getElementById('keterangan_sts').style.display = "block";
        }
    }
</script>

@endsection
