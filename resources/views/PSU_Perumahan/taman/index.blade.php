@extends('layouts/main')

@section('title', 'Input Data Taman Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="card shadow mb-4">
        <form method="post" action="/tamans/store">
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Taman :
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
                <div class="row">
                    <div class="col-sm-3">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="data_taman[0][perumahan_id]"
                               value="{{$data_perumahan->id}}">

                        <label for="nama_taman">Nama Taman</label><br>
                        <input type="text" class="form-control @error('nama_taman') is-invalid
                                           @enderror" id="nama_taman"
                               name="data_taman[0][nama_taman]"
                               placeholder="Masukan Nama Taman"
                               value="{{ old('nama_taman') }}">
                        @error('nama_taman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <label for="luas_taman">Luas Taman</label><br>
                        <input type="number" class="form-control @error('luas_taman')
                                           is-invalid @enderror" id="luas_taman"
                               name="data_taman[0][luas_taman]"
                               placeholder="Luas Taman"
                               value="{{ old('luas_taman') }}">
                        @error('luas_taman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label for="kondisi_taman">Kondisi Taman</label><br>
                        <select
                            class="custom-select @error('kondisi_taman') is-invalid @enderror"
                            id="kondisi_sarana"
                            name="data_taman[0][kondisi_taman]"
                            value="{{ old('kondisi_taman') }}">
                            <option value="">--Pilih Kondisi Taman--</option>
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
                                id="add_data_taman">
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
                    </div>
                </div>
                <input type="hidden" id="jumlah-form" value="0">
                <div id="taman-form"></div>

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

@include('PSU_Perumahan.taman.tabel_taman')
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
<script type="text/javascript" src="../assets/js/perumahan/taman/taman_form.js"></script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
