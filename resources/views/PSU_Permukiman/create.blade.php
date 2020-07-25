@extends('layouts/main')

@section('title', 'Input Data Permukiman')

@section('container-fluid')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Permukiman</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        @forelse( $permukiman_id as $id )
                        @php
                        $id_plus= $id->id + 1;
                        echo "ID: $id_plus";
                        @endphp
                        @empty
                        @php
                        $id_plus= 1;
                        echo "ID: $id_plus";
                        @endphp
                        @endforelse
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/permukimans/store">
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
                                   value="{{ old('nama_tpu') }}">
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
                                   value="{{ old('luas_tpu') }}">
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
                                   value="{{ old('daya_tampung') }}">

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
                                id="tahun_dibangun" name="tahun_digunakan"
                                value="{{ old('tahun_digunakan') }}">
                                <option value="">--Pilih Tahun Digunakan--</option>
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
                                      placeholder="Masukan Alamat Lokasi">{{ old('lokasi') }}</textarea>
                        </div>


                        <div class="col-sm-3 mt-2">
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
                                id="kelurahan" name="kelurahan"
                                value="{{ old('kelurahan') }}">
                                <option value="">--Pilih Kelurahan--</option>
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
                            @error('kelurahan')
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
                                value="{{ old('status') }}"
                                onchange="displayForm(this)">
                                <option value="0">--Pilih Status--</option>
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
                            <div style="display: none" id="kondisi_0">
                                <label for="kondisi">Kondisi</label>
                                <select
                                    class="custom-select @error('kondisi') is-invalid @enderror"
                                    id="kondisi" name="kondisi"
                                    value="{{ old('kondisi') }}">
                                    <option value="">--Pilih Kondisi--</option>
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
                            <div style="display: none" id="keterangan_sts">
                                <label for="keterangan_status">Keterangan Status</label>
                                <textarea class="form-control @error('keterangan_status') is-invalid
                              @enderror" id="keterangan_status" name="keterangan_status" rows="3"
                                          placeholder="Masukan Keterangan Status">{{ old('keterangan_status') }}</textarea>
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
                                      placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <a href="/permukimans" class="btn btn-info btn-icon-split">
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
                </div>
            </form>
        </div>
    </div>
</div>


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/getKelurahan.js"></script>

<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/sarana_form.js"></script>

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
