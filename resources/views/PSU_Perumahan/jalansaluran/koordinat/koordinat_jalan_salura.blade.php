<form method="post" action="/koordinatjalansalurans/store" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">
                Kelola Data Koordinat Jalan dan Saluran</h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <select class="form-control" name="jalansaluran_id" id="jalansaluran_id">
                        <option value="0">--Pilih Nama Jalan Saluran--</option>
                        @forelse( $data_jalan_saluran as $jalansaluran )
                        <option
                            value="{{$jalansaluran->id}}">{{$jalansaluran->nama_jalan_saluran}}</option>
                        @empty
                        <option value="0" style="color: red">
                            Tidak Ada Nama Jalan Saluran</option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-4">
                    <label for="nama_koordinat">
                        Nama Koordinat Jalan Saluran
                    </label><br>
                    <input type="text" class="form-control
                               @error('nama_koordinat') is-invalid
                               @enderror" id="nama_koordinat" name="nama_koordinat"
                           placeholder="Masukan Nama Foto"
                           value="{{ old('nama_koordinat') }}">
                    @error('nama_koordinat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="col-sm-4">
                    <label for="longitude">Koordinat Longitude</label><br>
                    <input type="text" class="form-control @error('longitude') is-invalid
                               @enderror" id="longitude" name="longitude"
                           placeholder="Masukan Nama Foto"
                           value="{{ old('longitude') }}">
                    @error('longitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <input type="hidden" class="form-control" id="perumahan_id"
                           name="perumahan_id"
                           value="{{$data_perumahan->id}}">
                </div>

                <div class="col-sm-4">
                    <label for="latitude">Koordinat Latitude</label><br>
                    <input type="text" class="form-control @error('latitude') is-invalid
                                 @enderror" id="latitude" name="latitude"
                           placeholder="Masukan Nama Foto"
                           value="{{ old('latitude') }}">
                    @error('latitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <input type="hidden" class="form-control" id="perumahan_id"
                           name="perumahan_id"
                           value="{{$data_perumahan->id}}">
                </div>

                <div class="col-sm-4 mt-3">
                    <button type="submit" class="btn btn-info btn-icon-split"
                            id="reset_data">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                        <span class="text">Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
