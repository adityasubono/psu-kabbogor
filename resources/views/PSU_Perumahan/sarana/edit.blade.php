<form method="post" action="/saranas/update/{{$sarana->id}}">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-sm-4">
            <input type="hidden"
                   class="form-control"
                   id="perumahan_id"
                   name="perumahan_id"
                   value="{{$sarana->perumahan_id}}">
            <label for="nama_sarana">Nama Sarana</label><br>
            <input type="text"
                   class="form-control @error('nama_sarana') is-invalid @enderror" id="nama_sarana"
                   name="nama_sarana"
                   placeholder="Masukan Nama Sarana"
                   value="{{$sarana->nama_sarana}}">
            @error('nama_sarana')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="luas_sarana">Luas Sarana</label><br>
            <input type="number"
                   class="form-control @error('luas_sarana')is-invalid @enderror"
                   id="luas_sarana"
                   name="luas_sarana"
                   placeholder="Luas Sarana"
                   value="{{$sarana->luas_sarana}}">
            @error('luas_sarana')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="kondisi_sarana">Kondisi Sarana</label><br>
            <select
                class="custom-select @error('kondisi_sarana') is-invalid @enderror"
                id="kondisi_sarana"
                name="kondisi_sarana">
                <option value="{{$sarana->kondisi_sarana}}">{{$sarana->kondisi_sarana}}</option>
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
            @error('kondisi_sarana')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <button type="submit"
            class="btn btn-primary btn-icon-split mt-3 float-right"
            id="btn_simpan">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
        <span class="text">Simpan</span>
    </button>
</form>
