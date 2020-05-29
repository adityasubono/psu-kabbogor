<form method="post" action="/permukimans/filter" role="search">
    @csrf
    <div class="row">
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
                class="custom-select @error('tahun') is-invalid @enderror"
                id="status_perumahan" name="status">
                <option value="">--Pilih Status--</option>
                <option value="Sudah Beroperasonal">Sudah Beroperasonal</option>
                <option value="Belum Beroperasonal">Belum Beroperasonal</option>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="operator">Aksi</label><br>
            <button type="submit" class="btn btn-primary btn-icon-split" id="do-filte">
                <span class="icon text-white-50">
                    <i class="fas fa-filter"></i>
                </span>
                <span class="text">Filter</span>
            </button>

            <button type="submit" class="btn btn-info btn-icon-split" id="do-filte">
                <span class="icon text-white-50">
                    <i class="fas fa-sync"></i>
                </span>
                <span class="text">Reset</span>
            </button>
        </div>
    </div>
</form>


<div class="row mb-3">
    <div class="col-sm-6 mt-3">
        <form method="post" action="/permukimans/import" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="file_foto">Upload File Excel</label><br>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="file_import"
                           id="file_import"
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
                <button type="submit" class="btn btn-primary btn-icon-split ml-3">
            <span class="icon text-white-50">
                <i class="fas fa-upload"></i>
            </span>
                    <span class="text">Upload</span>
                </button>
            </div>
        </form>
    </div>


    <div class="col-sm-3 mt-3">
        <label for="operator">Aksi</label><br>
        <a href="/permukimans/export" class="btn btn-success btn-icon-split" id="do-filte">
            <span class="icon text-white-50">
                <i class="fas fa-download"></i>
            </span>
            <span class="text">Import File</span>
        </a>
    </div>
</div>

