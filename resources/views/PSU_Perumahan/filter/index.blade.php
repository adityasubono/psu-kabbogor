
<div class="row mb-3">
    <div class="col-sm-3">
        <label for="operator">Filter Kecamatan</label>
        <select class="custom-select @error('kecamatan') is-invalid @enderror"
                id="kecamatan" name="kecamatan"
                value="{{ old('kecamatan') }}">
            <option value="">--Pilih Kecamatan--</option>
            @foreach( $kecamatans as $kecamatan)
            <option value="{{ $kecamatan->nama_kecamatan }}">
                {{ $kecamatan->nama_kecamatan }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-3">
        <label for="kelurahan">Filter Keluarahan/Desa</label>
        <select class="custom-select @error('kelurahan') is-invalid @enderror"
                id="kelurahan" name="kelurahan"
                value="{{ old('kelurahan') }}">
            <option value="">--Pilih Keluarahan--</option>
        </select>
    </div>

    <div class="col-sm-3">
        <label for="operator">Filter Status</label>
        <select
            class="custom-select @error('status_perumahan') is-invalid @enderror"
            id="status_perumahan" name="status_perumahan"
            value="{{ old('status_perumahan') }}">
            <option value="">--Pilih Status--</option>
            <option value="Sudah">Sudah Serah Terima</option>
            <option value="Belum">Belum Serah Terima</option>
            <option value="Terlantar">Terlantar</option>
        </select>
    </div>

    <div class="col-sm-3">
        <label for="operator">Aksi</label><br>
        <button type="submit" class="btn btn-info btn-icon-split" id="do-filte">
                            <span class="icon text-white-50">
                                <i class="fas fa-filter"></i>
                            </span>
            <span class="text">Filter</span>
        </button>
    </div>

    <div class="col-sm-6 mt-3">
        <label for="file_foto">Upload File Excel</label><br>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="file_foto"
                       id="file_foto"
                       class="custom-file-input
                                   @error('file_foto') is-invalid @enderror">
                <label class="custom-file-label">Pilih
                    File Excel....</label>
                @error('file_foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-sm-6 mt-3">
        <label for="operator">Aksi</label><br>
        <button type="submit" class="btn btn-primary btn-icon-split" id="do-filte">
            <span class="icon text-white-50">
                <i class="fas fa-upload"></i>
            </span>
            <span class="text">Upload</span>
        </button>

        <button type="submit" class="btn btn-success btn-icon-split" id="do-filte">
            <span class="icon text-white-50">
                <i class="fas fa-download"></i>
            </span>
            <span class="text">Import File</span>
        </button>
    </div>
</div>



