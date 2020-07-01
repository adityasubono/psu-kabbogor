<ul class="nav nav-tabs border border-0">
    <li class="nav-item dropdown border border-0">
        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" role="link">
            {{ $sarana->nama_sarana }}
        </a>
        <div class="dropdown-menu bg-success">
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#foto_sarana{{ $sarana->id }}"
               data-backdrop="static"
               data-keyboard="false">
                Input Data Foto Sarana
            </a>
            <a class="dropdown-item"
               href="/koordinatsarana/{{ $sarana->id }}">Input Data Koordinat Sarana
            </a>
            <a class="dropdown-item"
               href="#"
               data-toggle="modal"
               data-target="#edit_data_sarana{{ $sarana->id }}"
               data-backdrop="static"
               data-keyboard="false">Edit Data Sarana
            </a>
        </div>
    </li>
</ul>


<!-- Modal -->
<div class="modal fade" id="foto_sarana{{ $sarana->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Geserlah File Gambar / Foto
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <h5> ID Sarana : {{ $sarana->id }}</h5>
                <h5> ID Perumahan : {{ $perumahans->id }}</h5>
                <h5>Foto Gambar Sarana {{ $sarana->nama_sarana }}</h5>

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
                    <button type="button" class="btn btn-primary btn-icon-split mt-3 float-right"
                            onClick="window.location.reload()">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                        <span class="text">Simpan</span>
                    </button>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data_sarana{{ $sarana->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit Data Sarana {{$sarana->nama_sarana}} || ID Sarana : {{$sarana->id}}
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('PSU_Perumahan.sarana.edit')
            </div>
        </div>
    </div>
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
