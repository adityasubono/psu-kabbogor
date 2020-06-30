<meta name="csrf-token" content="{{ csrf_token() }}">

<form action="/fotosaranas/update/{{ $fotosarana->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <img src="../../assets/uploads/perumahan/sarana/{{ $fotosarana->file_foto }}"
                     style="width:100%;height:300px;">
                <div class="card-body">
                    <b>Gambar / Foto Sebelumnya</b>
                    <p class="card-text">Keterangan : {{$fotosarana->keterangan}}</p>
                    <input type="hidden" class="form-control" name="sarana_id"
                           value="{{ $sarana->id}}">
                    <input type="hidden" class="form-control" name="perumahan_id"
                           value="{{ $sarana->perumahan_id}}">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <img id="image_preview_container" src="../../assets/images/no_picture.jpg"
                     alt="preview image" style="width:100%;height:300px;">
                <div class="card-body">
                    <b>Gambar / Foto Setelah Diganti</b><br>
                    <label for="file_foto">Upload Foto</label><br>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="file_foto"
                                   id="file_foto"
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
    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#file_foto').change(function () {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

        $('#upload_image_form').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ url('save-photo')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('Image has been uploaded successfully');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>

