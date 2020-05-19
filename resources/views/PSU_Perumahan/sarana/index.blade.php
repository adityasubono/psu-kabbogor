@extends('layouts/main')

@section('title', 'Input Data Sarana Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="card shadow mb-4">
        <form method="post" action="/saranas/store">
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Sarana :
                            {{$data_perumahan->nama_perumahan}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">
                            ID : {{$data_perumahan->id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body bg-gray-200" id="data_sarana">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <div class="row">
                    <div class="col-sm-3">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="data_sarana[0][perumahan_id]"
                               value="{{$data_perumahan->id}}">

                        <label for="nama_sarana">Nama Sarana</label><br>
                        <input type="text" class="form-control @error('nama_sarana') is-invalid
                                           @enderror" id="nama_sarana"
                               name="data_sarana[0][nama_sarana]"
                               placeholder="Masukan Nama Sarana"
                               value="{{ old('nama_sarana') }}">
                        @error('nama_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <label for="luas_sarana">Luas Sarana</label><br>
                        <input type="number" class="form-control @error('luas_sarana')
                                           is-invalid @enderror" id="luas_sarana"
                               name="data_sarana[0][luas_sarana]"
                               placeholder="Luas Sarana"
                               value="{{ old('luas_sarana') }}">
                        @error('luas_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="kondisi_sarana">Kondisi Sarana</label><br>
                        <select
                            class="custom-select @error('kondisi_sarana') is-invalid @enderror"
                            id="kondisi_sarana"
                            name="data_sarana[0][kondisi_sarana]"
                            value="{{ old('kondisi_sarana') }}">
                            <option value="">--Pilih Kondisi Sarana--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                        @error('kondisi_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="aksi">Aksi</label><br>
                        <button type="button" class="btn btn-success btn-icon-split"
                                id="add_data_sarana">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </button>

                        <button type="button" class="btn btn-info btn-icon-split"
                                id="btn-reset-form">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Reset</span>
                        </button>

                    </div>
                </div>

                <input type="hidden" id="jumlah-form" value="0">
                <div id="sarana-form"></div>

                <button type="submit" class="btn btn-primary btn-icon-split mt-3"
                        id="btn_simpan">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                    <span class="text">Simpan</span>
                </button>
            </div>
        </form>
    </div>

    <!--    Tabel Data Sarana     -->
    @include('PSU_Perumahan.sarana.tabel_sarana')
    <!--    Tabel Data Foto     -->
    @include('PSU_Perumahan.sarana.foto.tabel_foto_sarana')
    <!--    Tabel Koordinat Sarana      -->
    @include('PSU_Perumahan.sarana.koordinat.tabel_koordinat_sarana')

</div>


<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>

<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../assets/js/perumahan/sarana/sarana_form.js"></script>
<script type="text/javascript" src="../assets/js/sarana/foto_sarana_form.js"></script>


<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
