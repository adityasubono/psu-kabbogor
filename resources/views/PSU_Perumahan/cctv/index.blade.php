@extends('layouts/main')

@section('title', 'Input Data CCTV Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data CCTV Perumahan :
                    {{$data_perumahan->nama_tpu}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$data_perumahan->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200">

        <div class="form-group">
            <form action="/cctvperumahans/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="data_cctv[0][perumahan_id]"
                               value="{{$data_perumahan->id}}">

                        <label for="nama_cctv">Nama CCTV</label><br>
                        <input type="text" class="form-control @error('data_cctv.*.nama_cctv')
                        is-invalid @enderror" id="nama_cctv"
                               name="data_cctv[0][nama_cctv]"
                               placeholder="Masukan Nama CCTV"
                               value="{{ old('data_cctv.*.nama_cctv') }}">
                        @error('data_cctv.*.nama_cctv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="ip_cctv">IP CCTV</label><br>
                        <input type="text" class="form-control @error('data_cctv.*.ip_cctv')
                                           is-invalid @enderror" id="ip_cctv"
                               name="data_cctv[0][ip_cctv]"
                               placeholder="Masukan IP CCTV"
                               value="{{ old('data_cctv.*.ip_cctv') }}">
                        @error('data_cctv.*.ip_cctv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="ip_cctv">Aksi</label><br>
                        <button type="button" class="btn btn-success btn-icon-split mr-2"
                                id="add_data_cctv">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                            <span class="text">Tambah</span>
                        </button>

                        <button type="button" class="btn btn-info btn-icon-split"
                                id="btn-reset-form">
                        <span class="icon text-white-50">
                            <i class="fas fa-sync"></i>
                        </span>
                            <span class="text">Reset</span>
                        </button>
                        <input type="hidden" id="jumlah-form" value="0">
                    </div>
                </div>

                <!--                Form CCTV -------->
                <div id="cctv_form"></div>
                <!--                Form CCTV -------->

                <button type="submit" class="btn btn-primary btn-icon-split mt-3"
                        id="submit_pengelolah">
                        <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                        </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>
    @include('PSU_Perumahan.cctv.tabel_cctv_perumahan')
</div>


<!--Scrpit Data CCTV Form -->
<script type="text/javascript" src="../assets/js/perumahan/cctv/cctv_form.js"></script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection
