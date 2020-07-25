
<label for="file_foto" class="mt-3">Upload Foto Perumahan / Siteplan</label><br>
<div class="input-group mb-2">
    <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
    </div>
    <div class="custom-file">
        <input type="file"
               name="file_foto[]"
               id="gallery-photo-add"
               class="custom-file-input @error('file_foto') is-invalid @enderror" multiple>
        <label class="custom-file-label">Pilih File Foto....</label>
        @error('file_foto')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<input type="hidden" name="perumahan_id" value="{{$perumahans->id}}">
<div id="galery"></div>



<script type="text/javascript">
    $(function () {
        // Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML(
                            '<img id="review_image" class="img-thumbnail">' + '')).attr('src', event
                            .target
                            .result)
                        .appendTo
                        (placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, '#galery');
        });
    });
</script>
