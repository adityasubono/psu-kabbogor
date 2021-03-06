@extends('layouts/main')

@section('title', 'Tambah Data Perumahan')

@section('container-fluid')
<link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
<div class="container-fluid">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item ml-1">
            <a class="nav-link active bg-primary text-white" id="home-tab" data-toggle="tab"
               href="#data_perumahan" role="tab">Data Perumahan</a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white disabled" id="profile-tab" data-toggle="tab"
               href="#data_sarana" role="tab"
               style="background-color: #6c757d;">Data Sarana</a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white disabled" id="contact-tab" data-toggle="tab"
               href="#data_jalan_saluran" role="tab"
               style="background-color:  #6c757d;">Data Jalan dan Saluran</a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white disabled" id="contact-tab" data-toggle="tab"
               href="#data_taman_penghijauan" role="tab"
               style="background-color: #6c757d;">Data Taman dan Penghijauan</a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white disabled" id="profile-tab" data-toggle="tab"
               href="#data_pju" role="tab"
               style="background-color: #6c757d;">Data PJU </a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white disabled" id="contact-tab" data-toggle="tab"
               href="#data_saluran_bersih" role="tab"
               style="background-color: #6c757d;">Data Saluran Bersih</a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white disabled" id="contact-tab" data-toggle="tab"
               href="#data_cctv" role="tab"
               style="background-color: #6c757d;;">Data CCTV</a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white disabled" id="contact-tab" data-toggle="tab"
               href="#data_koordinat" role="tab"
               style="background-color: #6c757d;;">Data Koordinat</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="data_perumahan" role="tabpanel">
            @include('PSU_Perumahan.perumahan.create')
        </div>

        <div class="tab-pane fade" id="data_sarana" role="tabpanel">
            Data Sarana
        </div>

        <div class="tab-pane fade" id="data_jalan_saluran" role="tabpanel">
            Data Jalan dan Saluran
        </div>

        <div class="tab-pane fade" id="data_taman_penghijauan" role="tabpanel">
            Data Taman dan Penghijauan
        </div>

        <div class="tab-pane fade" id="data_pju" role="tabpanel">
            Data PJU
        </div>

        <div class="tab-pane fade" id="data_saluran_bersih" role="tabpanel">
            Data Saluran Bersih
        </div>

        <div class="tab-pane fade" id="data_cctv" role="tabpanel">
            Data CCTV
        </div>

        <div class="tab-pane fade" id="data_koordinat" role="tabpanel">
            Data Koordinat Perumahan
        </div>
    </div>
</div>
@endsection

