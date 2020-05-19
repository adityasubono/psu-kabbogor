<form method="post" action="/fotosaranas/store" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Foto Data Sarana</h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <select class="form-control" name="sarana_id" id="sarana_id">
                        <option value="0">--Pilih Nama Sarana--</option>
                        @forelse( $data_sarana as $sarana )
                        <option value="{{$sarana->id}}">{{$sarana->nama_sarana}}</option>
                        @empty
                        <option value="0" style="color: red">Tidak Ada Nama Sarana</option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-4">
                    <label for="nama_foto">Nama Foto Sarana</label><br>
                    <input type="text" class="form-control @error('nama_foto') is-invalid
                                 @enderror" id="nama_foto" name="nama_foto"
                           placeholder="Masukan Nama Foto"
                           value="{{ old('nama_foto') }}">
                    @error('nama_foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <input type="hidden" class="form-control" id="perumahan_id"
                           name="perumahan_id"
                           value="{{$data_perumahan->id}}">
                </div>

                <div class="col-sm-4">
                    <label for="file_foto_sarana">Upload Foto</label><br>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="file_foto">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input
                                   @error('file_foto_sarana') is-invalid @enderror"
                                   id="file_foto_sarana"
                                   name="file_foto_sarana">
                            <label class="custom-file-label" for="inputGroupFile01">Choose
                                File</label>
                            @error('file_foto_sarana')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label for="aksi">Aksi</label><br>
                    <button type="button" class="btn btn-success btn-icon-split"
                            id="add_data_foto_sarana">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Tambah</span>
                    </button>
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
<!--                <input type="hidden" id="jumlah-form" value="0">-->
