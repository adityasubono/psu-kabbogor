<form action="/sksiteplan/update/{{$siteplan->id}}" method="post">
    @method('patch')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <label for="no_sk_siteplan">No. SK Siteplan</label><br>
            <input type="hidden" name="perumahan_id" value="{{$siteplan->perumahan_id}}">
            <input type="text"
                   class="form-control @error('no_sk_siteplan') is-invalid @enderror"
                   id="no_sk_siteplan"
                   name="no_sk_siteplan"
                   placeholder="Masukan No.SK Siteplan"
                   value="{{$siteplan->no_sk_siteplan}}">
            @error('no_sk_siteplan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="tanggal_sk_siteplan">Tanggal</label><br>
            <input type="date"
                   class="form-control @error('tanggal_sk_siteplan') is-invalid @enderror"
                   id="tanggal_sk_siteplan"
                   name="tanggal_sk_siteplan"
                   placeholder="Pilih Tanggal"
                   value="{{$siteplan->tanggal}}">
            @error('tanggal_sk_siteplan')
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

