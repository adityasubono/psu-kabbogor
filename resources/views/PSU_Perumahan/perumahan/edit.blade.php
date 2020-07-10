@extends('layouts/main')

@section('title', 'Edit Data Perumahan')

@section('container-fluid')

<div class="container-fluid">
    @if (session('status'))
    <div class="alert alert-success fade show" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Perumahan
                        : {{$perumahans->nama_perumahan}}</h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        ID : {{$perumahans->id}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">

            <ul class="nav nav-tabs mt-0" id="myTab" role="tablist">
                <li class="nav-item ml-1">
                    <a class="nav-link active bg-danger text-white" id="home-tab" data-toggle="tab"
                       href="#data_perumahan" role="tab">Data Perumahan</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link text-white " id="data_sarana" data-toggle="tab"
                       href="#sarana_tab" role="tab"
                       style="background-color: darkgoldenrod;">Data Sarana </a>
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link text-white" id="contact-tab" data-toggle="tab"
                       href="#data_jalan_saluran" role="tab"
                       style="background-color:olive;">Data Jalan dan Saluran</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link text-white" id="contact-tab" data-toggle="tab"
                       href="#data_taman_penghijauan" role="tab"
                       style="background-color: #0E9A00;">Data Taman dan Penghijauan</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link text-white " id="profile-tab" data-toggle="tab"
                       href="#data_pju" role="tab"
                       style="background-color: #1c294e;">Data PJU </a>
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link text-white" id="contact-tab" data-toggle="tab"
                       href="#data_saluran_bersih" role="tab"
                       style="background-color: darkmagenta;">Data Saluran Bersih</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link text-white " id="contact-tab" data-toggle="tab"
                       href="#data_cctv" role="tab"
                       style="background-color: #2a96a5;;">Data CCTV</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="data_perumahan" role="tabpanel">
                    @include('PSU_Perumahan.perumahan.perumahan_tab')
                </div>

                <div class="tab-pane fade" id="sarana_tab" role="tabpanel">
                    @include('PSU_Perumahan.sarana.sarana_tab')
                </div>

                <div class="tab-pane fade" id="data_jalan_saluran" role="tabpanel">
                    @include('PSU_Perumahan.jalansaluran.jalansaluran_tab')
                </div>

                <div class="tab-pane fade" id="data_taman_penghijauan" role="tabpanel">
                    @include('PSU_Perumahan.taman.taman_tab')
                </div>

                <div class="tab-pane fade" id="data_pju" role="tabpanel">
                    @include('PSU_Perumahan.pju.pju_tab')
                </div>

                <div class="tab-pane fade" id="data_saluran_bersih" role="tabpanel">
                    @include('PSU_Perumahan.saluran_bersih.saluran_tab')
                </div>

                <div class="tab-pane fade" id="data_cctv" role="tabpanel">
                    @include('PSU_Perumahan.cctv.cctv_tab')
                </div>
            </div>
            <a href="/perumahans" class="btn btn-info btn-icon-split mt-3">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-alt-circle-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection
