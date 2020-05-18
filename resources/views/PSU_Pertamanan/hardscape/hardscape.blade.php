@extends('layouts/main')

@section('title', 'Input Data Peralatan Pemeliharaan ( Pertamanan )')

@section('container-fluid')
<div class="container-fluid">
    <div class="card-header bg-gray-500 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Hardscape :
                    {{$data_pertamanan->nama_taman}}
                </h6>
            </div>
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary text-right">ID :
                    {{$data_pertamanan->id}}
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body bg-gray-200">

        @if (session('status'))
        <div class="alert alert-success fade show" role="alert">
            {{ session('status') }}
        </div>
        @endif


        <form action="/hardscapes/store" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-3">

                    <input type="hidden" class="form-control" id="pertamanan_id"
                           name="data_hardscape[0][pertamanan_id]"
                           value="{{$data_pertamanan->id}}">

                    <label for="nama_alat">Nama Alat </label><br>
                    <input type="text" class="form-control @error('data_hardscape.*.nama_alat') is-invalid
                            @enderror" id="nama_alat"
                           name="data_hardscape[0][nama_alat]"
                           placeholder="Masukan Nama Alat"
                           value="{{ old('data_hardscape[0][nama_alat]') }}">
                    @error('data_hardscape.*.nama_alat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <label for="merk">Merek / Tipe</label><br>
                    <input type="text" class="form-control @error('data_hardscape.*.tipe')
                           is-invalid @enderror"
                           id="merk"
                           name="data_hardscape[0][tipe]"
                           placeholder="Masukan Merk / Tipe"
                           value="{{ old('data_hardscape[0][tipe]') }}">
                    @error('data_hardscape.*.tipe')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="tahun_perolehan">Tahun Perolehan</label><br>
                    <select
                        class="custom-select @error('data_hardscape.*.tahun_perolehan')
                        is-invalid @enderror"
                        id="tahun_perolehan" name="data_hardscape[0][tahun_perolehan]">
                        <option value="{{ old('data_hardscape[0][tahun_perolehan]') }}"
                                selected>
                            {{ old ('data_hardscape[0][tahun_perolehan]') }}
                        </option>
                        @php
                        $tahun=getdate();
                        @endphp
                        @for($i = $tahun['year']; $i >= 2010; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    @error('data_hardscape.*.tahun_perolehan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="kondisi">Kondisi</label><br>
                    <select
                        class="custom-select @error('data_hardscape.*.kondisi') is-invalid
                        @enderror"
                        id="kondisi" name="data_hardscape[0][kondisi]">
                        <option value="{{ old('data_hardscape[0][kondisi]') }}" selected>
                            {{ old ('data_hardscape[0][kondisi]') }}
                        </option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                    @error('data_hardscape.*.kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-2">
                    <label for="keterangan">Keterangan</label><br>
                    <textarea class="form-control @error('data_hardscape.*.keterangan')
                              is-invalid @enderror" id="keterangan"
                              name="data_hardscape[0][keterangan]"
                              rows="3"
                              placeholder="Masukan Deskripsi Keterangan">{{
                        old('data_hardscape[0][keterangan]')
                        }}</textarea>
                    @error('data_hardscape.*.keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-4 mt-2">
                    <button type="button" class="btn btn-success btn-icon-split mr-2"
                            id="add_data_pemeliharaan">
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


            <div class="row pl-3 pr-3">
                <div id="pemeliharaan-form"></div>
            </div>

            <button type="submit" class="btn btn-primary btn-icon-split mt-3"
                    id="btn-reset-form">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                <span class="text">Simpan</span>
            </button>
        </form>
    </div>


    @include('PSU_Pertamanan.hardscape.tabel_hardscape')

</div>

<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/pertamanan/pemeliharaan_form.js"></script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection

