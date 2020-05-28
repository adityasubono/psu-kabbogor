@extends('layouts/main')

@section('title', 'Input Data Foto Jalan Saluran')

@section('container-fluid')
<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Foto :
                    {{$data_jalansaluran->nama_jalan_saluran}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID Jalan Saluran:
                    {{$data_jalansaluran->id}} ||
                    ID Perumahan:
                    {{$data_jalansaluran->perumahan_id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200">
        <div class="form-group">

            @if (session('status'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <h5>Geser Gambar / Foto Disini</h5>
            <meta name="_token" content="{{csrf_token()}}"/>
            <form method="post" action="{{url('/fotojalansalurans/store')}}"
                  enctype="multipart/form-data"
                  class="dropzone" id="dropzone">
                <input type="hidden" class="form-control" id="jalansaluran_id"
                       name="jalansaluran_id"
                       value="{{$data_jalansaluran->id}}">

                <input type="hidden" class="form-control" id="perumahan_id"
                       name="perumahan_id"
                       value="{{$data_jalansaluran->perumahan_id}}">

                @csrf
            </form>
            <button type="button" class="btn btn-primary btn-icon-split mt-3 float-right"
                    onClick="window.location.reload()">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                <span class="text">Simpan</span>
            </button><br>
        </div>
    </div>

    @include('PSU_Perumahan.jalansaluran.foto.tabel_foto_jalan_saluran')
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
                    url: '{{ url("/fotojalansaluran/delete") }}',
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

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection
