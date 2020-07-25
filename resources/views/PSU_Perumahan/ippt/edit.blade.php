<form action="/ippt/update/{{$ippt->id}}" method="post">
    @method('patch')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <label for="no_ippt">No. IPPT</label><br>
            <input type="hidden" name="perumahan_id" value="{{$ippt->perumahan_id}}">
            <input type="text"
                   class="form-control @error('no_ippt') is-invalid @enderror"
                   id="no_ippt"
                   name="no_ippt"
                   placeholder="Masukan No.BASTA"
                   value="{{$ippt->no_ippt}}">
            @error('no_ippt')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="tanggal_ippt">Tanggal</label><br>
            <input type="date"
                   class="form-control @error('tanggal_ippt') is-invalid @enderror"
                   id="tanggal_ippt"
                   name="tanggal_ippt"
                   placeholder="Pilih Tanggal"
                   value="{{$ippt->tanggal}}">
            @error('tanggal_ippt')
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

