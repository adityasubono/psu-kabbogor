<form method="post" action="/tamans/update/{{$taman->id}}">
    @method('patch')
    @csrf
    <div class="row">
        <div class="col-sm-4">
            <input type="hidden" class="form-control" id="perumahan_id"
                   name="perumahan_id"
                   value="{{$taman->perumahan_id}}">

            <label for="nama_taman">Nama Taman</label><br>
            <input type="text" class="form-control @error('nama_taman') is-invalid
                                           @enderror" id="nama_taman"
                   name="nama_taman"
                   placeholder="Masukan Nama Taman"
                   value="{{$taman->nama_taman }}">
            @error('nama_taman')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="luas_taman">Luas Taman ( m3 )</label><br>
            <input type="number" class="form-control @error('luas_taman')
                                           is-invalid @enderror" id="luas_taman"
                   name="luas_taman"
                   placeholder="Luas Taman ( m3 )"
                   value="{{$taman->luas_taman}}">
            @error('luas_taman')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="kondisi_taman">Kondisi Taman</label><br>
            <select
                class="custom-select @error('kondisi_taman') is-invalid @enderror"
                id="kondisi_sarana"
                name="kondisi_taman">
                <option value="{{$taman->kondisi_taman}}" selected>
                    {{$taman->kondisi_taman}}
                </option>
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
            @error('kondisi_taman')
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

