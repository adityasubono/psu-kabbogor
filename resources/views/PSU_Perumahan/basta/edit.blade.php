<form action="/basta/update/{{$basta->id}}" method="post">
    @method('patch')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <label for="basta">No. BASTA</label><br>
            <input type="hidden" name="perumahan_id" value="{{$basta->perumahan_id}}">
            <input type="text"
                   class="form-control @error('no_basta') is-invalid @enderror"
                   id="basta"
                   name="no_basta"
                   placeholder="Masukan No.BASTA"
                   value="{{$basta->no_basta}}">
            @error('no_basta')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="tanggal_basta">Tanggal</label><br>
            <input type="date"
                   class="form-control @error('tanggal_basta') is-invalid @enderror"
                   id="tanggal_basta"
                   name="tanggal_basta"
                   placeholder="Pilih Tanggal"
                   value="{{$basta->tanggal}}">
            @error('tanggal_basta')
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

