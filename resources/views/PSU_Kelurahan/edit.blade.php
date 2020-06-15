@extends('layouts.main')

@section('title', 'Input Data User')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Kecamatan
                        {{$kecamatan->nama_kecamatan}}</h6>
                </div>

                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                        {{$kecamatan->id}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="/kelurahans/update/{{$kecamatan->id}}" method="post">
                @csrf
                @method('patch')

                <div class="row mb-3">
                    @php
                    $a = 0;
                    @endphp
                    @foreach ( $data_kelurahan as $kelurahan )
                    <div class="col-sm-3">
                        <label for="nama_kelurahan"> Nama Kelurahan: data_kelurahan[@php echo $a @endphp][nama_kelurahan]</label>
                        <input type="text" class="form-control" id="nama"
                               name="data_kelurahan[@php echo $a @endphp][nama_kelurahan]"
                               value="{{$kelurahan->nama_kelurahan}}">
                        <input type="text" class="form-control" id="nama"
                               name="data_kelurahan[@php echo $a @endphp][id]"
                               value="{{$kelurahan->id}}">
                    </div>
                    @php
                    $a++;
                    @endphp
                    @endforeach
                </div>

                <a href="/kecamatans" class="btn btn-info btn-icon-split mt-3"
                   id="btn-reset-form">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>


                <button type="submit" class="btn btn-primary btn-icon-split mt-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
