@extends('layouts/main')

@section('title', 'Input Data Jalan Saluran Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="card shadow mb-4">
        <form method="post" action="/jalansalurans/store">
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Kelola Data Jalan dan Saluran :
                            {{$data_perumahan->nama_perumahan}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">
                            ID : {{$data_perumahan->id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body" id="data_jalansaluran">
                <div class="row">
                    <div class="col-sm-3">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="data_jalan_saluran[0][perumahan_id]"
                               value="{{$data_perumahan->id}}">

                        <label for="nama_jalansaluran">Nama Jalan Saluran</label><br>
                        <input type="text" class="form-control @error('nama_jalan_saluran')
                               is-invalid @enderror" id="nama_jalansaluran"
                               name="data_jalan_saluran[0][nama_jalan_saluran]"
                               placeholder="Masukan Nama Jalan dan Saluran"
                               value="{{ old('nama_jalan_saluran') }}">
                        @error('nama_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <label for="luas_jalansaluran">Luas Jalan Saluran</label><br>
                        <input type="number" class="form-control @error('luas_jalan_saluran')
                                     is-invalid @enderror" id="luas_jalansaluran"
                               name="data_jalan_saluran[0][luas_jalan_saluran]"
                               placeholder="Luas Jalan dan Saluran"
                               value="{{ old('luas_jalan_saluran') }}">
                        @error('luas_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="kondisi_jalan_saluran">Kondisi Jalan Saluran</label><br>
                        <select
                            class="custom-select @error('kondisi_jalan_saluran')
                            is-invalid @enderror"
                            id="kondisi_jalan_saluran"
                            name="data_jalan_saluran[0][kondisi_jalan_saluran]"
                            value="{{ old('kondisi_jalan_saluran') }}">
                            <option value="">--Pilih Kondisi Sarana--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                        @error('kondisi_jalan_saluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="aksi">Aksi</label><br>
                        <button type="button" class="btn btn-success btn-icon-split"
                                id="add_data_jalan_saluran">
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
                <div id="jalansaluran-form"></div>
            </div>




            <button type="submit" class="btn btn-primary btn-icon-split m-3"
                    id="add_data_jalan_saluran">
                        <span class="icon text-white-50">
                             <i class="fas fa-download"></i>
                        </span>
                <span class="text">Simpan</span>
            </button>
        </form>
    </div>


@include('PSU_Perumahan.jalansaluran.tabel_jalansaluran')


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
<script type="text/javascript" src="../assets/js/perumahan/jalansaluran/jalansaluran_form
.js"></script>
<script type="text/javascript" src="../assets/js/sarana/foto_sarana_form.js"></script>


<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
