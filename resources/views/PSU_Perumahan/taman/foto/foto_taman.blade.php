<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="form-group">
    <h5>Geser Gambar / Foto Disini</h5>
    <meta name="_token" content="{{csrf_token()}}"/>
    <form method="post" action="{{url('/fototamans/store')}}"
          enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        <input type="hidden" class="form-control" id="taman_id"
               name="taman_id"
               value="{{$taman->id}}">

        <input type="hidden" class="form-control" id="perumahan_id"
               name="perumahan_id"
               value="{{$taman->perumahan_id}}">
        @csrf
    </form>
    <button type="button" class="btn btn-primary btn-icon-split mt-3 float-right"
            onClick="window.location.reload()">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
        <span class="text">Simpan</span>
    </button>
    <br>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
    Dropzone.options.dropzone =
        {
            maxFilesize: 12,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            timeout: 5000,
            addRemoveLinks: true,
            removedfile: function (file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url("/fotosaranas/delete") }}',
                    data: {filename: name},
                    success: function (data) {
                        console.log("File deleted successfully!!");
                    },
                    error: function (e) {
                        console.log('gagal dihapus');
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
</script>
