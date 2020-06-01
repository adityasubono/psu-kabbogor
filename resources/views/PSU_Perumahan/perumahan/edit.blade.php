@extends('layouts/main')

@section('title', 'Edit Data Perumahan')

@section('container-fluid')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Perumahan
                    : {{$perumahans->nama_perumahan}}</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        ID : {{$perumahans->id}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/perumahans/update/{{$perumahans->id}}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama_perumahan">Nama Perumahan</label>
                            <br>
                            <input type="text" class="form-control @error('nama_perumahan') is-invalid
                                   @enderror"
                                   id="nama_perumahan"
                                   name="nama_perumahan"
                                   placeholder="Masukan Nama Perumahan"
                                   value="{{$perumahans->nama_perumahan}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>

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
                                   value="{{$perumahans->nama_pengembang}}">
                            <small class="form-text text-danger">* Wajib Diisi</small>

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
                                   value="{{$perumahans->luas_perumahan}}">

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
                                   value="{{$perumahans->jumlah_perumahan}}">

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
                                      placeholder="Masukan Alamat Lokasi">{{
                                $perumahans->lokasi}}</textarea>
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
                                <option value=" {{$perumahans->kecamatan}}"
                                        class="bg-primary text-white" selected>
                                    {{$perumahans->kecamatan}}
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

                        <div class="col-sm-3">
                            <label for="kelurahan">Kelurahan</label><br>
                            <select
                                class="custom-select @error('kelurahan') is-invalid @enderror"
                                id="kelurahan" name="kelurahan">
                                <option value="{{$perumahans->kelurahan}}"selected
                                        class="bg-primary text-white">
                                    {{$perumahans->kelurahan}}
                                </option>
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
                            <input type="number" class="form-control"
                                   id="RT"
                                   name="RT"
                                   placeholder="RT"
                                   value="{{$perumahans->RT}}">
                        </div>

                        <div class="col-sm-3">
                            <label for="RW">RW</label><br>
                            <input type="number" class="form-control
                            "
                                   id="RW"
                                   name="RW"
                                   placeholder="RW"
                                   value="{{$perumahans->RW}}">
<!--                            <small class="form-text text-danger">* Wajib Diisi</small>-->
<!--                            @error('RT')-->
<!--                            <div class="invalid-feedback">-->
<!--                                {{ $message }}-->
                            </div>
<!--                            @enderror-->
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
                                <option value="{{$perumahans->status_perumahan}}">
                                    {{$perumahans->status_perumahan}}</option>
                                <option value="Sudah Serah Terima">Sudah Serah Terima</option>
                                <option value="Belum Serah Terima">Belum Serah Terima</option>
                                <option value="Terlantar">Terlantar</option>
                            </select>
                            <small class="form-text text-danger">* Wajib Diisi</small>
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
                                       value="{{$perumahans->tgl_serah_terima}}">
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
                                       value="{{$perumahans->no_bast}}">
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
                                       value="{{$perumahans->sph}}">
                                @error('sph')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid
                              @enderror" id="keterangan" name="keterangan" rows="3"
                              placeholder="Masukan Keterangan">{{
                        $perumahans->keterangan}}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <a href="/perumahans" class="btn btn-info btn-icon-split">
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

<script type="text/javascript">
    var status_perumahan = $('#status_perumahan').val();
    function displayForm(elem) {
        if (elem.value === "Sudah Serah Terima") {
            document.getElementById('tgl_serah_terima').style.display = "block";

        } else if (elem.value === "Belum Serah Terima") {
            document.getElementById('tgl_serah_terima').style.display = "none";

        } else if (elem.value === "Terlantar") {
            document.getElementById('tgl_serah_terima').style.display = "none";

        } else if (status_perumahan === "{{$perumahans->status_perumahan}}") {
            document.getElementById('tgl_serah_terima').style.display = "block";

        }
    }
</script>


@endsection
