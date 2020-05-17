@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Perumahan</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        @foreach( $perumahan_id as $id )
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
            <form method="post" action="/perumahans">
                @csrf
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama_perumahan">Nama Perumahan</label><br>
                            <input type="text" class="form-control @error('nama_perumahan') is-invalid
                                   @enderror"
                                   id="nama_perumahan"
                                   name="nama_perumahan"
                                   placeholder="Masukan Nama Perumahan"
                                   value="{{ old('nama_perumahan') }}">

                            @error('nama_perumahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label for="nama_pengembang">Nama Pengembang</label><br>
                            <input type="text" class="form-control @error('nama_pengembang') is-invalid
                                   @enderror"
                                   id="nama_pengembang"
                                   name="nama_pengembang"
                                   placeholder="Masukan Nama Pengembang"
                                   value="{{ old('nama_pengembang') }}">

                            @error('nama_pengembang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="luas_perumahan">Luas Perumahan (m2)</label><br>
                            <input type="number" class="form-control @error('luas_perumahan')
                                   is-invalid @enderror"
                                   id="luas_perumahan"
                                   name="luas_perumahan"
                                   placeholder="Masukan Luas Perumahan"
                                   value="{{ old('luas_perumahan') }}">

                            @error('luas_perumahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="jumlah_perumahan">Jumlah Rumah</label><br>
                            <input type="number" class="form-control @error('jumlah_perumahan') is-invalid
                                   @enderror"
                                   id="jumlah_perumahan"
                                   name="jumlah_perumahan"
                                   placeholder="Masukan Jumlah Rumah"
                                   value="{{ old('jumlah_perumahan') }}">

                            @error('jumlah_rumah')
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


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="status_perumahan">Status</label><br>
                            <select class="custom-select @error('status_perumahan')
                                    is-invalid @enderror"
                                    id="status_perumahan" name="status_perumahan"
                                    onchange="displayForm
                                    (this)">
                                <option value="">--Pilih Status--</option>
                                <option value="Sudah">Sudah Serah Terima</option>
                                <option value="Belum">Belum Serah Terima</option>
                                <option value="Terlantar">Terlantar</option>
                            </select>
                            @error('status_perumahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                    </div>


                    <!--                PSU YANG DISERAHKAN : BILA SUDAH SERAH TERIMA               -->

                    <div class="form-group" style="display: none" id="tgl_serah_terima">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="tgl_serah_terima">Tanggal Serah Terima</label><br>
                                <input type="date" class="form-control @error('tgl_serah_terima') is-invalid
                                   @enderror" id="tgl_serah_terima" name="tgl_serah_terima"
                                       placeholder="Masukan Tanggal Serah Terima"
                                       value="{{ old('tgl_serah_terima') }}">
                                @error('tgl_serah_terima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <label for="no_bast">No. Berita Acara Serah Terima</label><br>
                                <input type="text" class="form-control @error('no_bast') is-invalid
                                   @enderror" id="no_bast" name="no_bast"
                                       placeholder="Masukan No. Berita Acara Serah Terima"
                                       value="{{ old('no_bast') }}">
                                @error('no_bast')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="sph">No. Surat Pengakuan hak</label><br>
                                <input type="text" class="form-control @error('sph') is-invalid
                                       @enderror" id="sph" name="sph"
                                       placeholder="Masukan Surat Pengakuan hak"
                                       value="{{ old('sph') }}">
                                @error('sph')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>


                @csrf
                <div style="display: block" id="psu_data_sarana">
                    <div class="card-header py-3 bg-gray-500 rounded">
                        <h6 class="m-0 font-weight-bold text-primary">PSU Yang Diserahkan : Data
                            Sarana</h6>
                    </div>

                    <!---------------------------                Data Sarana      ------------------------------------->
                    <div class="card-body bg-gray-200" id="data_sarana">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    @foreach( $perumahan_id as $id )
                                    @php
                                    $id_plus= $id->id + 1;
                                    @endphp

                                    <input type="hidden" class="form-control" id="perumahan_id"
                                           name="data_sarana[0][perumahan_id]" value="@php echo
                                           $id_plus @endphp">
                                    @endforeach


                                    <label for="nama_sarana">Nama Sarana</label><br>
                                    <input type="text" class="form-control @error('nama_sarana') is-invalid
                                           @enderror" id="nama_sarana"
                                           name="data_sarana[0][nama_sarana]"
                                           placeholder="Masukan Nama Sarana"
                                           value="{{ old('nama_sarana') }}">
                                    @error('nama_sarana')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <label for="luas_sarana">Luas Sarana</label><br>
                                    <input type="number" class="form-control @error('luas_sarana')
                                           is-invalid @enderror" id="luas_sarana"
                                           name="data_sarana[0][luas_sarana]"
                                           placeholder="Masukan Luas Sarana"
                                           value="{{ old('luas_sarana') }}">
                                    @error('luas_sarana')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <label for="kondisi_sarana">Kondisi Sarana</label><br>
                                    <select
                                        class="custom-select @error('kondisi_sarana') is-invalid @enderror"
                                        id="kondisi_sarana"
                                        name="data_sarana[0][kondisi_sarana]"
                                        value="{{ old('kondisi_sarana') }}">
                                        <option value="">--Pilih Kondisi Sarana--</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                    @error('kondisi_sarana')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-2">
                                    <label for="aksi">Aksi</label><br>
                                    <button type="button" class="btn btn-success btn-icon-split"
                                            id="add_data_sarana">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        <span class="text">Tambah</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-----------------------Jalan dan Saluran ---------------------------------------------->

                <div style="display: block" id="psu_data_jalan_saluran">
                    <div class="card-header py-3 bg-gray-500 rounded">
                        <h6 class="m-0 font-weight-bold text-primary">PSU Yang Diserahkan : Jalan
                            dan Saluran</h6>
                    </div>
                    <div class="card-body bg-gray-200" id="data_jalan_saluran">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="nama_jalan_saluran">Nama Jalan dan
                                        Saluran</label><br>

                                    @foreach( $perumahan_id as $id )
                                    @php
                                    $id_plus= $id->id + 1;
                                    @endphp

                                    <input type="hidden" class="form-control" id="perumahan_id"
                                           name="data_jalan_saluran[0][perumahan_id]" value="@php
                                           echo
                                           $id_plus @endphp">
                                    @endforeach

                                    <input type="text" class="form-control @error('nama_jalan_saluran')
                                       is-invalid @enderror" id="nama_jalan_saluran"
                                           name="data_jalan_saluran[0][nama_jalan_saluran]"
                                           placeholder="Masukan Nama Jalan dan Saluran"
                                           value="{{ old('nama_jalan_saluran') }}">
                                    @error('nama_jalan_saluran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <label for="luas_jalan_saluran">
                                        Luas Jalan dan Saluran</label><br>
                                    <input type="number" class="form-control @error('luas_jalan_saluran')
                                       is-invalid @enderror"
                                           id="luas_jalan_saluran"
                                           name="data_jalan_saluran[0][luas_jalan_saluran]"
                                           placeholder="Masukan Luas Jalan dan Saluran"
                                           value="{{ old('luas_jalan_saluran') }}">
                                    @error('luas_jalan_saluran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <label for="kondisi_jalan_saluran">Kondisi Jalan dan
                                        Saluran</label><br>
                                    <select
                                        class="custom-select @error('kondisi_jalan_saluran') is-invalid @enderror"
                                        id="kondisi_jalan_saluran"
                                        name="data_jalan_saluran[0][kondisi_jalan_saluran]"
                                        value="{{ old('kondisi_jalan_saluran') }}">
                                        <option value="">--Pilih Kondisi Jalan dan Saluran--
                                        </option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                    @error('kondisi_jalan_saluran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-2">
                                    <label for="aksi">Aksi</label><br>
                                    <button type="button" class="btn btn-success btn-icon-split"
                                            id="add_jalan_saluran">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                        <span class="text">Tambah</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div style="display: block" id="psu_data_taman">
                    <div class="card-header py-3 bg-gray-500 rounded">
                        <h6 class="m-0 font-weight-bold text-primary">Data Taman</h6>
                    </div>
                    <div class="card-body bg-gray-200" id="data_taman">
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <label for="nama_taman">Nama Taman</label><br>
                                    @foreach( $perumahan_id as $id )
                                    @php
                                    $id_plus= $id->id + 1;
                                    @endphp

                                    <input type="hidden" class="form-control" id="perumahan_id"
                                           name="data_taman[0][perumahan_id]" value="@php
                                           echo
                                           $id_plus @endphp">
                                    @endforeach

                                    <input type="text" class="form-control @error('nama_taman')
                                           is-invalid @enderror"
                                           id="nama_taman" name="data_taman[0][nama_taman]"
                                           placeholder="Masukan Nama Taman"
                                           value="{{ old('nama_taman') }}">
                                    @error('nama_taman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <label for="luas_taman">Luas Taman</label><br>
                                    <input type="number" class="form-control @error('luas_taman')
                                           is-invalid @enderror"
                                           id="luas_taman"
                                           name="data_taman[0][luas_taman]"
                                           placeholder="Masukan Luas Taman"
                                           value="{{ old('luas_taman') }}">
                                    @error('luas_taman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <label for="kondisi_taman">Kondisi Taman</label>
                                    <select
                                        class="custom-select @error('kondisi_taman') is-invalid @enderror"
                                        id="kondisi_taman" name="data_taman[0][kondisi_taman]"
                                        value="{{ old('kondisi_taman') }}">
                                        <option value="">--Pilih Kondisi Taman--</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak Ringan">Rusak Ringan</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                    @error('kondisi_taman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-2">
                                    <label for="aksi">Aksi</label><br>
                                    <button type="button" class="btn btn-success btn-icon-split"
                                            id="add_data_taman">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-plus"></i>
                                    </span>
                                        <span class="text">Tambah</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-----------------------------      Data Koordinat Perumahanan      ---------------------->

                <div class="card-header py-3 bg-gray-500 rounded">
                    <h6 class="m-0 font-weight-bold text-primary">Koordinat Perumahan</h6>
                </div>
                <div class="card-body bg-gray-200" id="data_koordinat_perumahan">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="longitude_perumahan">Koordinat Longitude</label><br>
                                @foreach( $perumahan_id as $id )
                                @php
                                $id_plus= $id->id + 1;
                                @endphp

                                <input type="hidden" class="form-control" id="perumahan_id"
                                       name="data_koordinat[0][perumahan_id]" value="@php
                                           echo
                                           $id_plus @endphp">
                                @endforeach

                                <input type="text" class="form-control @error('longitude_perumahan') is-invalid
                                       @enderror" id="longitude_perumahan"
                                       name="data_koordinat[0][longitude]"
                                       placeholder="Koordinat Longitude"
                                       value="{{ old('longitude_perumahan') }}">
                                @error('longitude_perumahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="latitude_perumahan">Koordinat Latitude</label><br>
                                <input type="text" class="form-control @error('latitude_perumahan') is-invalid
                                       @enderror" id="latitude_perumahan"
                                       name="data_koordinat[0][latitude]"
                                       placeholder="Koordinat Latitude"
                                       value="{{ old('latitude_perumahan') }}">
                                @error('latitude_perumahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="aksi">Aksi</label><br>
                                <button type="button" class="btn btn-success btn-icon-split"
                                        id="add_data_koordinat_perumahan">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <!------------------------------- Data CCTV ---------------------------------------------->

                <div class="card-header py-3 bg-gray-500 rounded">
                    <h6 class="m-0 font-weight-bold text-primary"> PSU Yang Diserahkan : Data
                        CCTV</h6>
                </div>
                <div class="card-body bg-gray-200" id="data_cctv">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nama_cctv">Nama CCTV</label>
                                @foreach( $perumahan_id as $id )
                                @php
                                $id_plus= $id->id + 1;
                                @endphp

                                <input type="hidden" class="form-control" id="perumahan_id"
                                       name="data_cctv[0][perumahan_id]" value="@php
                                           echo
                                           $id_plus @endphp">
                                @endforeach
                                <input type="text" class="form-control @error('nama_cctv') is-invalid
                                       @enderror" id="nama_cctv" name="data_cctv[0][nama_cctv]"
                                       placeholder="Masukan Nama CCTV"
                                       value="{{ old('nama_cctv') }}">
                                @error('nama_cctv')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="ip_camera">IP Camera</label>
                                <input type="text" class="form-control @error('ip_camera') is-invalid
                                       @enderror" id="ip_camera" name="data_cctv[0][ip_camera]"
                                       placeholder="Masukan IP Camera"
                                       value="{{ old('ip_camera') }}">
                                @error('ip_camera')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="aksi">Aksi</label><br>
                                <button type="button" class="btn btn-success btn-icon-split"
                                        id="add_data_cctv">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                        </span>
                                    <span class="text">Tambah</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


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

<!--Scrpit Data Jalan dan Saluran -->
<script type="text/javascript" src="../assets/js/jalan_saluran_form.js"></script>

<!--Scrpit Data Taman -->
<script type="text/javascript" src="../assets/js/taman_form.js"></script>

<!--Scrpit Data Koordinat Perumahan-->
<script type="text/javascript" src="../assets/js/koordinat_perumahan_form.js"></script>

<!--Script Data CCTV-->
<script type="text/javascript" src="../assets/js/cctv_form.js"></script>


<script type="text/javascript">
    function displayForm(elem) {
        if (elem.value === "Sudah") {
            document.getElementById('tgl_serah_terima').style.display = "block";
            document.getElementById('psu_data_sarana').style.display = "block";
            document.getElementById('psu_data_jalan_saluran').style.display = "block";
            document.getElementById('psu_data_taman').style.display = "block";
        } else if (elem.value === "Belum") {
            document.getElementById('tgl_serah_terima').style.display = "none";
            document.getElementById('psu_data_sarana').style.display = "none";
            document.getElementById('psu_data_jalan_saluran').style.display = "none";
            document.getElementById('psu_data_taman').style.display = "none";
        } else if (elem.value === "Terlantar") {
            document.getElementById('tgl_serah_terima').style.display = "none";
            document.getElementById('keterangan_status').style.display = "none";
            document.getElementById('psu_data_sarana').style.display = "none";
            document.getElementById('psu_data_jalan_saluran').style.display = "none";
            document.getElementById('psu_data_taman').style.display = "none";
        } else if (elem.value === "") {
            document.getElementById('tgl_serah_terima').style.display = "none";
            document.getElementById('keterangan_status').style.display = "none";
            document.getElementById('psu_data_sarana').style.display = "none";
            document.getElementById('psu_data_jalan_saluran').style.display = "none";
            document.getElementById('psu_data_taman').style.display = "none";
        }
    }
</script>


@endsection
