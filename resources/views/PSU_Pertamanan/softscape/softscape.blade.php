<div class="card-header bg-gray-500 rounded">
    <h6 class="m-0 font-weight-bold text-primary">Data Softscape</h6>
</div>
<div class="card-body bg-gray-200">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3">
                @foreach( $pertamanan_id as $id )
                @php
                $id_plus= $id->id + 1;
                @endphp

                <input type="hidden" class="form-control" id="pertamanan_id"
                       name="data_softscape[0][pertamanan_id]"
                       value="@php echo $id_plus @endphp">
                @endforeach


                <label for="nama_alat">Nama Alat </label><br>
                <input type="text" class="form-control @error('data_softscape.*.nama_alat') is-invalid
                            @enderror" id="nama"
                       name="data_softscape[0][nama_alat]"
                       placeholder="Masukan Nama Alat"
                       value="{{ old('data_softscape.*.nama_alat') }}">
                @error('data_softscape.*.nama_alat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-sm-3">
                <label for="merk">Merek / Tipe</label><br>
                <input type="number" class="form-control @error('data_softscape.*.tipe')
                                           is-invalid @enderror" id="umur"
                       name="data_softscape[0][tipe]"
                       placeholder="Masukan Merk / Tipe"
                       value="{{ old('data_softscape.*.tipe') }}">
                @error('data_softscape.*.tipe')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-3">
                <label for="tahun_diperoleh">Tahun Perolehan</label><br>
                <select
                    class="custom-select @error('data_softscape.*.pendidikan') is-invalid
                    @enderror"
                    id="tahun_diperoleh" name="data_softscape[0]tahun_diperoleh"
                    value="{{ old('data_softscape.*.tahun_diperoleh') }}">
                    <option value="">--Pilih Tahun Diperoleh--</option>
                    @php
                    $tahun=getdate();
                    @endphp
                    @for($i = $tahun['year']; $i >= 2000; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                @error('data_softscape.*.tahun_diperoleh')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-3">
                <label for="kondisi">Kondisi</label><br>
                <select
                    class="custom-select @error('data_softscape.*.kondisi') is-invalid
                    @enderror"
                    id="kondisi" name="data_softscape[0]kondisi"
                    value="{{ old('data_softscape.*.kondisi') }}">
                    <option value="">--Pilih Kondisi--</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
                @error('data_pemelihara.*.kondisi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="keterangan">Keterangan</label><br>
                <textarea class="form-control @error('data_petugas.*.keterangan_petugas') is-invalid
                              @enderror" id="keterangan"
                          name="data_softscape[0][keterangan_petugas]"
                          rows="3"
                          placeholder="Masukan Deskripsi Keterangan">{{ old('data_petugas.*.keterangan_petugas')
                        }}</textarea>
                @error('data_softscape.*.keterangan_petugas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-4 mt-2">
                <button type="button" class="btn btn-success btn-icon-split mr-2"
                        id="add_data_petugas">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                    <span class="text">Tambah</span>
                </button>

                <button type="button" class="btn btn-info btn-icon-split"
                        id="btn-reset-form">
                    <span class="icon text-white-50">
                        <i class="fas fa-sync"></i>
                    </span>
                    <span class="text">Reset</span>
                </button>
                <input type="hidden" id="jumlah-form" value="0">
            </div>
        </div>

        <div class="row pl-3 pr-3">
            <div id="petugas-form"></div>
        </div>

    </div>
</div>


<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/pertamanan/petugas_form.js"></script>


