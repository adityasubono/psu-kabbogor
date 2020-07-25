<form action="/cctvperumahans/update/{{$cctv->id}}" method="post">
    @method('patch')
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <input type="hidden"
                   class="form-control"
                   id="perumahan_id"
                   name="perumahan_id"
                   value="{{$cctv->perumahan_id}}">

            <label for="nama_cctv">Nama CCTV</label><br>
            <input type="text"
                   class="form-control @error('nama_cctv')is-invalid @enderror" id="nama_cctv"
                   name="nama_cctv"
                   placeholder="Masukan Nama CCTV"
                   value="{{$cctv->nama_cctv}}">
            @error('nama_cctv')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="ip_cctv">IP CCTV</label><br>
            <input type="text"
                   class="form-control @error('ip_cctv')is-invalid @enderror" id="ip_cctv"
                   name="ip_cctv"
                   placeholder="Masukan IP CCTV"
                   value="{{$cctv->ip_cctv}}">
            @error('ip_cctv')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <button type="submit"
            class="btn btn-primary btn-icon-split mt-3"
            id="submit_pengelolah">
        <span class="icon text-white-50">
            <i class="fas fa-download"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
</form>
