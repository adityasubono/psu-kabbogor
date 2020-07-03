<meta name="csrf-token-file-foto-taman" content="{{ csrf_token() }}">
<form action="/fototamans/update/{{ $fototaman->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <img src="../../assets/uploads/perumahan/taman/{{ $fototaman->file_foto }}"
                     style="width:100%;height:300px;">
                <div class="card-body">
                    <b>Gambar / Foto Sebelumnya</b>
                    <p class="card-text">Keterangan : {{$fototaman->keterangan}}</p>
                    <input type="hidden" class="form-control" name="taman_id"
                           value="{{ $taman->id}}">
                    <input type="hidden" class="form-control" name="perumahan_id"
                           value="{{ $taman->perumahan_id}}">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <img id="blah"
                     src="#"
                     alt="preview image" style="width:100%;height:300px;">
                <div class="card-body">
                    <b>Gambar / Foto Setelah Diganti</b><br>
                    <label for="file_foto">Upload Foto</label><br>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file"
                                   name="file_foto"
                                   id="imgInp"
                                   class="custom-file-input
                                   @error('file_foto') is-invalid @enderror">
                            <label class="custom-file-label">Pilih
                                File Foto....</label>
                            @error('file_foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <textarea class="form-control"
                              name="keterangan"
                              rows="2"
                              placeholder="Masukan Keterangan Gambar Disini"></textarea>
                    <button type="submit" class="btn btn-primary btn-icon-split mt-3">
                            <span class="icon text-white-50">
                               <i class="fas fa-download"></i>
                               </span>
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>



<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>

