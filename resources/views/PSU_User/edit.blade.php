@extends('layouts.main')

@section('title', 'Input Data User')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data User</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control @error('nik') is-invalid
                        @enderror" id="nik" name="nik"
                               placeholder="Masukan NIK" value="{{  $user->nik }}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
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

                    <div class="col-sm-3">
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

<!--                    <div class="col-sm-3">-->
<!--                        <label for="password">Password</label>-->
<!--                        <input type="password" class="form-control @error('password') is-invalid-->
<!--                               @enderror" id="password" name="password"-->
<!--                               aria-describedby="emailHelp" placeholder="Masukan Password"-->
<!--                               value="{{ $user->password}}">-->
<!--                        @error('password')-->
<!--                        <div class="invalid-feedback">-->
<!--                            {{ $message }}-->
<!--                        </div>-->
<!--                        @enderror-->
<!--                    </div>-->

                    <div class="col-sm-3">
                        <label for="role_id">Operator</label>
                        <select class="custom-select @error('role_id') is-invalid @enderror"
                                id="role_id" name="role_id">
                            <option value="{{$user->role_id}}" selected>{{$user->role_id}}</option>
                            @foreach($rules as $rule)
                            <option value="{{$rule->id}}">{{$rule->nama_rule}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="col-sm-3 mt-3">
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

                    <div class="col-sm-3 mt-3">
                        <label for="foto_sebelumnya">Foto Sebelumnya</label>
                        <img src="../../assets/uploads/user/{{$user->foto}}"
                             style="width: 200px; height:300px;">
                    </div>


                    <div class="col-sm-3 mt-3 rounded">
                        <label for="nama">Foto Baru</label><br>
                        <img id="image_preview_container" src="../../assets/images/no_picture.jpg"
                             alt="preview image" style="width: 200px; height:300px;">
                    </div>
                </div>

                    <button class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                        <span class="text">Simpan</span>
                    </button>

            </form>
        </div>
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
