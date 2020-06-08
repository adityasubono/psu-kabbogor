@extends('layouts.main')

@section('title', 'Input Data User')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data User :
                        @if(isset($data_user_password))
                        {{$data_user_password->nama}}
                        @else
                        {{$user->nama}}
                        @endif
                    </h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        @if(isset($data_user_password))
                        {{$data_user_password->nik}} || {{$data_rules->nama_rule}}
                        @else
                        {{$user->nik}} || {{$data_rules->nama_rule}}
                        @endif
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            @if(isset($data_user_password))

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form method="post" action="/users/update/">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <label for="pass_1">Masukan Password Baru</label>
                        <input type="password" class="form-control @error('pass_1') is-invalid
                        @enderror" id="pass_1" name="pass_1">
                        @error('pass_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="pass_2" class="mt-3">Masukan Password Lagi</label>
                        <input type="password" class="form-control @error('pass_2') is-invalid
                        @enderror" id="pass_2" name="pass_2" value="">
                        @error('pass_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </form>
            <button class="btn btn-primary btn-icon-split mt-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                <span class="text">Simpan</span>
            </button>


            @else

            <form method="post" action="/users/update/{{ $user->id }}"
                  enctype="multipart/form-data">
                  @method('patch')
                  @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid
                        @enderror" id="nama" name="nama"
                               placeholder="Masukan Nama" value="{{ $user->nama }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid
                        @enderror" id="email" name="email"
                               placeholder="Masukan Email" value="{{ $user->email }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6 mt-3">
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


                    <div class="col-sm-2 mt-3">
                        <label for="foto_sebelumnya">Foto Sebelumnya</label>
                        <img src="../../assets/uploads/user/{{$user->foto}}"
                             style="width: 200px; height:300px; border: black solid 1px">
                    </div>

                    <div class="col-sm-2 mt-3 rounded">
                        <label for="nama">Foto Baru</label><br>
                        <img id="image_preview_container"
                             src="../../assets/images/no_picture.jpg"
                             alt="preview image"
                             style="width: 200px; height:300px; border: black solid 1px">
                    </div>
                </div>

                <button class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
                <button class="btn btn-info btn-icon-split"
                        type="button"
                        data-toggle="modal"
                        data-target="#ganti_password"
                        data-backdrop="static"
                        data-keyboard="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-sync"></i>
                    </span>
                    <span class="text">Ganti Password</span>
                </button>
            </form>
            @endif
        </div>
    </div>
</div>

@if(isset($data_user_password))

@else
<div class="modal fade" id="ganti_password" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white text-bold">
                Masukan Password :
            </div>
            <form action="/users/editpassword" method="post" class="d-inline m-0">
                <div class="modal-body">
                    @method('post')
                    @csrf
                    <label for="password">Masukan Password Kamu</label>

                    <input type="text" class="form-control"
                           id="nik"
                           name="nik" value="{{$user->nik}}">

                    <input type="password" class="form-control"
                           id="password"
                           name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-ok">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

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

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
