<form method="post" action="/saluranbersih/update/{{$saluranbersih->id}}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-sm-4">
            <input type="hidden"
                   class="form-control"
                   id="perumahan_id"
                   name="perumahan_id"
                   value="{{$perumahans->id}}">
            <label for="nama_saluran">Nama Saluran Bersih</label><br>
            <input type="text"
                   class="form-control @error('nama_saluran')is-invalid @enderror"
                   id="nama_saluran"
                   name="nama_saluran"
                   placeholder="Masukan Nama Saluran"
                   value="{{$saluranbersih->nama_saluran}}">
            @error('nama_saluran')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="jumlah">Jumlah Saluran</label><br>
            <input type="number"
                   class="form-control @error('jumlah') is-invalid @enderror"
                   id="jumlah"
                   name="jumlah"
                   placeholder="Masukan Jumlah"
                   value="{{$saluranbersih->jumlah}}">
            @error('jumlah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="kondisi">Kondisi Saluran Bersih</label><br>
            <select
                class="custom-select @error('kondisi')is-invalid @enderror"
                id="kondisi"
                name="kondisi"
                value="{{ old('kondisi') }}">
                <option value="{{$saluranbersih->kondisi}}" selected>{{$saluranbersih->kondisi}}</option>
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
