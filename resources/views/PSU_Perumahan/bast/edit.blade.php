<form action="/bast/update/{{$bast->id}}" method="post">
    @method('patch')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <label for="no_bast">No. BAST</label><br>
            <input type="hidden" name="perumahan_id" value="{{$bast->perumahan_id}}">
            <input type="text"
                   class="form-control @error('no_bast') is-invalid @enderror"
                   id="no_bast"
                   name="no_bast"
                   placeholder="Masukan No.BAST"
                   value="{{$bast->no_bast}}">
            @error('no_bast')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="tanggal_bast">Tanggal</label><br>
            <input type="date"
                   class="form-control @error('tanggal_bast') is-invalid @enderror"
                   id="tanggal_bast"
                   name="tanggal_bast"
                   placeholder="Pilih Tanggal"
                   value="{{$bast->tanggal}}">
            @error('tanggal_bast')
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

