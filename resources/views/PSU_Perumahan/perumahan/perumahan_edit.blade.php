<div class="card shadow mb-4">
    <div class="card-header text-white bg-primary">
        Data Perumahan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <label>Nama Perumahan </label><br>
                <label>Nama Pengembang </label><br>
                <label>Nama Luas Perumahan </label><br>
                <label>Lokasi</label><br>
                <label>Status</label><br>
                <label>Keterangan</label><br>
            </div>
            <div class="col-10">
                <label>: {{$perumahans->nama_perumahan}}</label><br>
                <label>: {{$perumahans->nama_pengembang}}</label><br>
                <label>: {{$perumahans->luas_perumahan}} / (m2)</label><br>
                <label>: {{$perumahans->lokasi}} , {{$perumahans->kelurahan}}, {{$perumahans->kecamatan}}</label><br>
                @if ($perumahans->status_perumahan == 'Sudah Serah Terima')
                <label style="color: green">:<b> {{$perumahans->status_perumahan}}</b></label><br>
                @elseif ($perumahans->status_perumahan == 'Belum Serah Terima')
                <label style="color: gold">:<b> {{$perumahans->status_perumahan}}</b></label><br>
                @else
                <label style="color: red">:<b> {{$perumahans->status_perumahan}}</b></label><br>
                @endif
                <label>: {{$perumahans->keterangan}}</label><br>

                <button type="button"
                        class="btn btn-warning btn-icon-split float-right"
                        data-toggle="modal"
                        data-target="#edit_data_perumahan{{$perumahans->id}}"
                        data-backdrop="static"
                        data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                    <span class="text">Edit</span>
                </button>

                <a href="/koordinatperumahans/{{$perumahans->id}}"
                        class="btn btn-success btn-icon-split float-left mr-3" target="_blank">
                <span class="icon text-white-50">
                    <i class="fas fa-map"></i>
                </span>
                    <span class="text">Tambah Koordinat Perumahan</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data_perumahan{{ $perumahans->id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalScrollableTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data Perumahan {{$perumahans->nama_perumahan}}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
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
                                <input type="text"
                                       class="form-control @error('nama_pengembang') is-invalid @enderror"
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
                                    <option value="{{$perumahans->kelurahan}}" selected
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
                                <label for="status_perumahan">Status</label><br>
                                <select class="custom-select @error('status_perumahan')
                                    is-invalid @enderror"
                                        id="status_perumahan" name="status_perumahan"
                                        onchange="displayForm
                                    (this)">
                                    <option value="{{$perumahans->status_perumahan}}" selected>
                                        {{$perumahans->status_perumahan}}
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

                    <button type="button"
                            class="btn btn-danger btn-icon-split float-right ml-3"
                            data-dismiss="modal">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                        <span class="text">Batal</span>
                    </button>

                    <button type="submit"
                            class="btn btn-primary btn-icon-split float-right ml-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                        <span class="text">Simpan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_koordinat_perumahan{{ $perumahans->id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalScrollableTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Data Koordinat Perumahan {{$perumahans->nama_perumahan}}
                </h5>
                <button type="button"
                        class="close bg-danger p-sm-4"
                        data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.koordinat_perumahan.koordinat_perumahan')
            </div>
        </div>
    </div>
</div>



@include('PSU_Perumahan.foto_siteplan.foto_siteplan')


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../../assets/js/getKelurahan.js"></script>

<script type="text/javascript">
    var status_perumahan = $('#status_perumahan').val();

    function displayForm(elem) {
        if (elem.value === "Sudah Serah Terima") {
            document.getElementById('tgl_serah_terima').style.display = "none";

        } else if (elem.value === "Belum Serah Terima") {
            document.getElementById('tgl_serah_terima').style.display = "none";

        } else if (elem.value === "Terlantar") {
            document.getElementById('tgl_serah_terima').style.display = "none";

        } else if (status_perumahan === "{{$perumahans->status_perumahan}}") {
            document.getElementById('tgl_serah_terima').style.display = "block";

        }
    }
</script>

