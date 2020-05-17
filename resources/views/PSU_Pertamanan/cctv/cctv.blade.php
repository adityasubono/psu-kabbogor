
<div class="card-header py-3 bg-gray-500 rounded">
    <h6 class="m-0 font-weight-bold text-primary"> Data CCTV Pertamanan</h6>
</div>
<div class="card-body bg-gray-200" id="data_cctv">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
                <label for="nama_cctv">Nama CCTV</label>
                @foreach( $pertamanan_id as $id )
                @php
                $id_plus= $id->id + 1;
                @endphp

                <input type="hidden" class="form-control" id="perumahan_id"
                       name="data_cctv[0][perumahan_id]" value="@php
                                           echo
                                           $id_plus @endphp">
                @endforeach
                <input type="text" class="form-control @error('data_cctv.*.[nama_cctv]') is-invalid
                       @enderror" id="nama_cctv" name="data_cctv[0][nama_cctv]"
                       placeholder="Masukan Nama CCTV"
                       value="{{ old('nama_cctv') }}">
                @error('data_cctv.*.[nama_cctv]')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-5">
                <label for="ip_cctv">IP CCTV</label>
                <input type="text" class="form-control @error('data_cctv.*.[ip_cctv]') is-invalid
                       @enderror" id="ip_cctv" name="data_cctv[0][ip_cctv]"
                       placeholder="Masukan IP CCTV"
                       value="{{ old('ip_camera') }}">
                @error('data_cctv.*.[ip_cctv]')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-sm-2">
                <label for="aksi">Aksi</label><br>
                <button type="button" class="btn btn-success btn-icon-split"
                        id="add_data_cctv">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                        </span>
                    <span class="text">Tambah</span>
                </button>
            </div>
        </div>
    </div>
</div>


<!--Script Data CCTV-->
<script type="text/javascript" src="../assets/js/pertamanan/cctv_form.js"></script>


