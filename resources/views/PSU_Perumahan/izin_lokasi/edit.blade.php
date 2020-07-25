<form action="/izinlokasi/update/{{$izin->id}}" method="post">
    @method('patch')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <label for="no_izin">No. Izin Lokasi</label><br>
            <input type="hidden" name="perumahan_id" value="{{$izin->perumahan_id}}">
            <input type="text"
                   class="form-control @error('no_izin') is-invalid @enderror"
                   id="no_izin"
                   name="no_izin"
                   placeholder="Masukan No.Izin"
                   value="{{$izin->no_izin}}">
            @error('no_izin')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="tanggal_izin">Tanggal</label><br>
            <input type="date"
                   class="form-control @error('tanggal_izin') is-invalid @enderror"
                   id="tanggal_izin"
                   name="tanggal_izin"
                   placeholder="Pilih Tanggal"
                   value="{{$izin->tanggal}}">
            @error('tanggal_izin')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <button type="submit"
            class="btn btn-primary btn-icon-split float-right mt-3">
        <span class="icon text-white-50">
            <i class="fas fa-save"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
</form>

