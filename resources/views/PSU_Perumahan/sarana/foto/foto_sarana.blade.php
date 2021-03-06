<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">

<h5> ID Sarana : {{ $sarana->id }} || ID Perumahan : {{ $perumahans->id }}</h5>
<h5>Kelompok Foto/Gambar Sarana {{ $sarana->nama_sarana }}</h5>

<div class="form-group">
    <meta name="_token" content="{{csrf_token()}}"/>
    <form method="post" action="{{url('/fotosaranas/store')}}"
          enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        <input type="hidden" class="form-control" id="sarana_id"
               name="sarana_id"
               value=" {{ $sarana->id }}">

        <input type="hidden" class="form-control" id="perumahan_id"
               name="perumahan_id"
               value=" {{$perumahans->id}}">

        @csrf
    </form>
    <span class="text-danger">Maksimal Foto/Gambar Yang Dimasukan 12 File</span>
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
                    data: {
                        filename: name
                    },
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

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>


