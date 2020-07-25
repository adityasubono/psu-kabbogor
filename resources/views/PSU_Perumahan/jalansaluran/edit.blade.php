<form method="post" action="/jalansalurans/update/{{$jalansaluran->id}}">
    @method('patch')
    @csrf

    <div class="row">
        <div class="col-sm-4">
            <input type="hidden" class="form-control" id="perumahan_id"
                   name="perumahan_id"
                   value="{{$jalansaluran->perumahan_id}}">

            <label for="nama_jalansaluran">Nama Jalan Saluran</label><br>
            <input type="text"
                   class="form-control @error('nama_jalan_saluran') is-invalid @enderror" id="nama_jalansaluran"
                   name="nama_jalan_saluran"
                   placeholder="Masukan Nama Jalan dan Saluran"
                   value="{{$jalansaluran->nama_jalan_saluran}}">
            @error('nama_jalan_saluran')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="luas_jalansaluran">Luas Jalan Saluran</label><br>
            <input type="number"
                   class="form-control @error('luas_jalan_saluran')is-invalid @enderror" id="luas_jalansaluran"
                   name="luas_jalan_saluran"
                   placeholder="Luas Jalan dan Saluran"
                   value="{{$jalansaluran->luas_jalan_saluran}}">
            @error('luas_jalan_saluran')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="kondisi_jalan_saluran">Kondisi Jalan Saluran</label><br>
            <select
                class="custom-select @error('kondisi_jalan_saluran')is-invalid @enderror"
                id="kondisi_jalan_saluran"
                name="kondisi_jalan_saluran">
                <option value="{{$jalansaluran->kondisi_jalan_saluran}}"
                        selected>{{$jalansaluran->kondisi_jalan_saluran}}</option>
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
            @error('kondisi_jalan_saluran')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-icon-split mt-3 float-right"
            id="add_data_jalan_saluran">
                        <span class="icon text-white-50">
                             <i class="fas fa-download"></i>
                        </span>
        <span class="text">Simpan</span>
    </button>
</form>

