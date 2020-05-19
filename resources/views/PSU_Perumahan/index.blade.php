@extends('layouts/main')

@section('title', 'Halaman Kelola Data Perumahan')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Perumahan</h6>
        </div>
        <div class="card-body">
            <a href="/perumahans/create" class="btn btn-primary btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                <span class="text">Add Data</span>
            </a>

            <form method="get" action="/perumahans/filter" role="search">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="operator">Filter Kecamatan</label>
                        <select class="custom-select @error('kecamatan') is-invalid @enderror"
                                id="kecamatan" name="kecamatan"
                                value="{{ old('kecamatan') }}">
                            <option value="">--Pilih Kecamatan--</option>
                            @foreach( $kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->nama_kecamatan }}">
                                {{ $kecamatan->nama_kecamatan }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="kelurahan">Filter Keluarahan/Desa</label>
                        <select class="custom-select @error('kelurahan') is-invalid @enderror"
                                id="kelurahan" name="kelurahan"
                                value="{{ old('kelurahan') }}">
                            <option value="">--Pilih Keluarahan--</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="operator">Filter Status</label>
                        <select
                            class="custom-select @error('status_perumahan') is-invalid @enderror"
                            id="status_perumahan" name="status_perumahan"
                            value="{{ old('status_perumahan') }}">
                            <option value="">--Pilih Status--</option>
                            <option value="Sudah">Sudah Serah Terima</option>
                            <option value="Belum">Belum Serah Terima</option>
                            <option value="Terlantar">Terlantar</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="operator">Aksi</label><br>
                        <button type="submit" class="btn btn-info btn-icon-split" id="do-filte">
                            <span class="icon text-white-50">
                                <i class="fas fa-filter"></i>
                            </span>
                            <span class="text">Filter</span>
                        </button>
                    </div>
                </div>
            </form>


            @if (session('status'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('status') }}
            </div>
            @endif
<!----------------------   Tabel Data Perumahan---------------------------->
              @include('PSU_Perumahan.includes.tabel_perumahan')

<!-----------------               Card Status Data     -------------------->
            @include('PSU_Perumahan.includes.card_label_data')
<!------------------------------------------------------------------------->
        </div>
    </div>
</div>

<!-----------------                POPUP Confirm Delete     ---------------------->



<!----------------     Pop Up Data Perumahan   ------------------->



<!--Modal Foto -->


<script type="text/javascript" src="../assets/js/getKelurahanPerumahan.js"></script>



<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>


@endsection
