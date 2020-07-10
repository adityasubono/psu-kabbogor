<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary">
        <div class="row">
            <div class="col-sm-6 text-white">
                Input Data Perumahan
            </div>
            <div class="col-sm-6 text-white text-right">
                    @forelse( $perumahan_id as $id )
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
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="/perumahans" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-sm-6">

                        <input type="hidden"
                               id="perumahan_id"
                               name="perumahan_id"
                               value="@php echo $id_plus@endphp">

                        <label for="nama_perumahan">Nama Perumahan</label>
                        <br>
                        <input type="text"
                               class="form-control @error('nama_perumahan') is-invalid @enderror"
                               id="nama_perumahan"
                               name="nama_perumahan"
                               placeholder="Masukan Nama Perumahan"
                               value="{{ old('nama_perumahan') }}">
                        <small class="form-text text-danger">* Wajib Diisi</small>

                        @error('nama_perumahan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="nama_pengembang">Nama Pengembang</label><br>
                        <input type="text"
                               class="form-control @error('nama_pengembang') is-invalid @enderror"
                               id="nama_pengembang"
                               name="nama_pengembang"
                               placeholder="Masukan Nama Pengembang"
                               value="{{ old('nama_pengembang') }}">
                        <small class="form-text text-danger">* Wajib Diisi</small>

                        @error('nama_pengembang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="col-sm-3">
                        <label for="luas_perumahan">Luas Perumahan (m2)</label><br>
                        <input type="number"
                               class="form-control @error('luas_perumahan') is-invalid @enderror"
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
                        <input type="number"
                               class="form-control @error('jumlah_perumahan') is-invalid @enderror"
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


                    <div class="col-sm-3">
                        <label for="kecamatan">Kecamatan</label><br>
                        <select
                            class="custom-select @error('kecamatan') is-invalid @enderror"
                            id="kecamatan"
                            name="kecamatan">
                            <option value="{{ old('kecamatan') }}" selected>
                                {{ old('kecamatan') }}
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
                            id="kelurahan"
                            name="kelurahan"
                            value="{{ old('kelurahan') }}">
                            <option value="{{ old('kelurahan') }}" selected>
                                {{ old('kelurahan') }}
                            </option>
                        </select>
                        <small class="form-text text-danger">* Wajib Diisi</small>

                        @error('kelurahan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="col-sm-6">
                        <label for="lokasi">Alamat</label><br>
                        <textarea class="form-control @error('lokasi') is-invalid @enderror"
                                  id="lokasi"
                                  name="lokasi" rows="3"
                                  placeholder="Masukan Alamat">{{ old('lokasi') }}</textarea>
                        @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="file_foto" class="mt-3">Upload Foto Perumahan / Siteplan</label><br>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file"
                                       name="file_foto[]"
                                       id="gallery-photo-add"
                                       class="custom-file-input
                                   @error('file_foto') is-invalid @enderror" multiple>
                                <label class="custom-file-label">Pilih ile Foto....</label>
                                @error('file_foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 mt-3 mb-4">
                        <div id="galery"></div>
                    </div>


                    <div class="col-sm-3 mt-3">
                        <label for="status_perumahan">Status</label><br>
                        <select class="custom-select @error('status_perumahan')is-invalid @enderror"
                                id="status_perumahan"
                                name="status_perumahan"
                                onchange="displayForm(this)">
                            <option value="{{ old('status_perumahan') }}" selected>
                                {{ old('status_perumahan') }}
                            </option>
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

                <div style="display: none" id="tgl_serah_terima">
                    <div class="row">
                        <div class="col-sm-3">

                            <input type="hidden"
                                   name="data_bast[0][perumahan_id]"
                                   value="@php echo $id_plus@endphp">


                            <label for="tgl_serah_terima">Tanggal Serah Terima</label><br>
                            <input type="date"
                                   class="form-control @error('tgl_serah_terima') is-invalid
                                   @enderror"
                                   id="tgl_serah_terima"
                                   name="data_bast[0][tanggal]"
                                   placeholder="Masukan Tanggal Serah Terima"
                                   value="{{ old('tgl_serah_terima') }}">
                            @error('tgl_serah_terima')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="no_bast">No. Berita Acara Serah Terima</label><br>
                            <input type="text" class="form-control @error('no_bast') is-invalid
                                   @enderror"
                                   id="no_bast"
                                   name="data_bast[0][no_bast]"
                                   placeholder="Masukan No. Berita Acara Serah Terima"
                                   value="{{ old('no_bast') }}">
                            @error('no_bast')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="sph">No. Surat Pengakuan hak</label><br>
                            <input type="text" class="form-control @error('sph') is-invalid
                                       @enderror"
                                   id="sph"
                                   name="data_bast[0][no_sph]"
                                   placeholder="Masukan Surat Pengakuan hak"
                                   value="{{ old('sph') }}">
                            @error('sph')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label for="sph">Aksi</label><br>
                            <button type="button"
                                    class="btn btn-info btn-icon-split ml-3 float-right"
                                    id="btn_form_reset_bast">
                                     <span class="icon text-white-50">
                                         <i class="fas fa-sync"></i>
                                     </span>
                                <span class="text">Reset</span>
                            </button>

                            <button type="button"
                                    class="btn btn-success btn-icon-split float-right"
                                    id="add_data_bast">
                                     <span class="icon text-white-50">
                                         <i class="fas fa-plus"></i>
                                     </span>
                                <span class="text">Tambah</span>
                            </button>
                        </div>
                    </div>

                    <input type="hidden" id="jumlah-form-bast" value="0">
                    <div id="bast-form"></div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                  id="keterangan"
                                  name="keterangan"
                                  rows="3"
                                  placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

        <a href="/perumahans" class="btn btn-info btn-icon-split mt-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </span>
            <span class="text">Kembali</span>
        </a>

        <button type="submit" class="btn btn-primary btn-icon-split mt-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
            <span class="text">Simpan</span>
        </button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        // Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML(
                            '<img id="review_image" class="img-thumbnail">' + '')).attr('src', event
                            .target
                            .result)
                        .appendTo
                        (placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, '#galery');
        });
    });
</script>


<!--Scrpit Data Kelurahan -->
<script type="text/javascript" src="../assets/js/getKelurahan.js"></script>

<!--Scrpit Data BAST -->
<script type="text/javascript" src="../assets/js/perumahan/bast/bast_form.js"></script>

<script type="text/javascript">
    function displayForm(elem) {
        if (elem.value === "Sudah Serah Terima") {
            document.getElementById('tgl_serah_terima').style.display = "block";
        } else if (elem.value === "Belum Serah Terima") {
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

