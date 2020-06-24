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
                <span class="text">Tambah Data</span>
            </a>

            @include('PSU_Perumahan.filter.index')



            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <!----------------------   Tabel Data Perumahan---------------------------->

            @if(isset($perumahan_filter))
            @include('PSU_Perumahan.filter.tabel_filter_perumahan')
            @else
            @include('PSU_Perumahan.includes.tabel_perumahan')
            @endif

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
