<form method="post" action="/pjus/update/{{$pju->id}}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-sm-4">
            <input type="hidden"
                   class="form-control"
                   id="perumahan_id"
                   name="perumahan_id"
                   value="{{$perumahans->id}}">
            <label for="nama_pju">Nama PJU</label><br>
            <input type="text"
                   class="form-control @error('nama_pju')is-invalid @enderror"
                   id="nama_pju"
                   name="nama_pju"
                   placeholder="Masukan Nama PJU"
                   value="{{$pju->nama_pju}}">
            @error('nama_pju')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="jumlah">Jumlah PJU</label><br>
            <input type="number"
                   class="form-control @error('jumlah') is-invalid @enderror"
                   id="jumlah"
                   name="jumlah"
                   placeholder="Masukan Jumlah"
                   value="{{$pju->jumlah}}">
            @error('jumlah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="kondisi">Kondisi PJU</label><br>
            <select
                class="custom-select @error('kondisi')is-invalid @enderror"
                id="kondisi"
                name="kondisi"
                value="{{ old('kondisi') }}">
                <option value="{{$pju->kondisi}}" selected>{{$pju->kondisi}}</option>
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
            @error('kondisi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>


    <button type="submit"
            class="btn btn-primary btn-icon-split mt-3 float-right"
            id="add_data_jalan_saluran">
            <span class="icon text-white-50">
                <i class="fas fa-download"></i>
            </span>
        <span class="text">Simpan</span>
    </button>
</form>
