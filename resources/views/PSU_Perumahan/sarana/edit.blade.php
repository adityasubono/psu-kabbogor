@extends('layouts/main')

@section('title', 'Edit Data Sarana Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card shadow mb-4">
        <form method="post" action="/saranas/update/{{$sarana->id}}">
            @method('PATCH')
            @csrf
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Sarana :
                            {{$sarana->nama_sarana}}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">
                            ID : {{$sarana->id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body bg-gray-200">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$sarana->perumahan_id}}">

                        <label for="nama_sarana">Nama Sarana</label><br>
                        <input type="text" class="form-control @error('nama_sarana') is-invalid
                                           @enderror" id="nama_sarana"
                               name="nama_sarana"
                               placeholder="Masukan Nama Sarana"
                               value="{{$sarana->nama_sarana}}">
                        @error('nama_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="luas_sarana">Luas Sarana</label><br>
                        <input type="number" class="form-control @error('luas_sarana')
                               is-invalid @enderror" id="luas_sarana"
                               name="luas_sarana"
                               placeholder="Luas Sarana"
                               value="{{$sarana->luas_sarana}}">
                        @error('luas_sarana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="kondisi_sarana">Kondisi Sarana</label><br>
                        <select
                            class="custom-select @error('kondisi_sarana') is-invalid @enderror"
                            id="kondisi_sarana"
                            name="kondisi_sarana">
                            <option value="{{$sarana->kondisi_sarana}}">{{$sarana->kondisi_sarana}}</option>
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
                </div>

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
