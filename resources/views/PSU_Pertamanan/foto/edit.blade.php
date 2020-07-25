@extends('layouts/main')

@section('title', 'Edit Data Foto ( Permukiman )')

@section('container-fluid')


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Foto :
                    {{$data_foto->nama_foto}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$data_foto->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200">
        <form action="/fotopertamanans/update/{{$data_foto->id}}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">
                <div class="col-sm-6">
                    <label for="nama_foto">Nama Foto:</label><br>
                    <input type="hidden" class="form-control" name="pertamanan_id"
                           value="{{$data_foto->pertamanan_id }}">

                    <input type="text" class="form-control" id="usr" name="nama_foto"
                           value="{{$data_foto->nama_foto }}">
                </div>
                <div class="col-sm-6">
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
                </div>

                <div class="col-sm-6 bg-light border mt-3 text-center rounded">
                    <label for="nama"><b>Foto Lama</b></label><br>
                    <img src="../../assets/uploads/pertamanan/{{$data_foto->file_foto}}"
                         style="width:400px;height:400px;">
                </div>

                <div class="col-sm-6 bg-light mt-3 text-center rounded">
                    <label for="nama"><b>Foto Baru</b></label><br>
                    <img id="image_preview_container" src="../../assets/images/no_picture.jpg"
                         alt="preview image" style="width:400px;height:400px;">
                </div>

                <div class="col-sm-4 mt-3">

                    <a href="/fotopertmanans/{{$data_foto->pertamanan_id}}" class="btn btn-danger
                    btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </span>
                        <span class="text">Batal</span>
                    </a>

                    <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#file_foto').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

        $('#upload_image_form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{ url('save-photo')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('Image has been uploaded successfully');
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });

</script>
@endsection
