<div class="card-header py-3 bg-gray-500 rounded">
    <h6 class="m-0 font-weight-bold text-primary">Data Koordinat Pertamanan</h6>
</div>
<div class="card-body bg-gray-200" id="data_koordinat_perumahan">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
                <label for="longitude">Koordinat Longitude</label><br>
                @foreach( $pertamanan_id as $id )
                @php
                $id_plus= $id->id + 1;
                @endphp

                <input type="hidden" class="form-control" id="pertamanan_id"
                       name="data_koordinat[0][pertamanan_id]"
                       value="@php echo $id_plus @endphp">
                @endforeach

                <input type="text" class="form-control @error('data_koordinat.*.[longitude]')
                is-invalid @enderror" id="longitude"
                       name="data_koordinat[0][longitude]"
                       placeholder="Koordinat Longitude"
                       value="{{ old('data_koordinat[0][longitude]') }}">
                @error('data_koordinat.*.[longitude]')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-5">
                <label for="latitude">Koordinat Latitude</label><br>
                <input type="text" class="form-control @error('data_koordinat.*.[latitude]')
                is-invalid
                       @enderror" id="latitude"
                       name="data_koordinat[0][latitude]"
                       placeholder="Koordinat Latitude"
                       value="{{ old('data_koordinat.*.[latitude]') }}">
                @error('data_koordinat.*.[latitude]')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-2">
                <label for="aksi">Aksi</label><br>
                <button type="button" class="btn btn-success btn-icon-split"
                        id="add_data_koordinat_perumahan">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-plus"></i>
                                    </span>
                    <span class="text">Tambah</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!--Scrpit Data Koordinat Perumahan-->
<script type="text/javascript" src="../assets/js/pertamanan/koordinat_form.js"></script>

