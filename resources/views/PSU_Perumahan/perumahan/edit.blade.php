@extends('layouts/main')

@section('title', 'Edit Data Perumahan')

@section('container-fluid')

<div class="container-fluid">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item ml-1">
            <a class="nav-link active bg-primary text-white" id="home-tab" data-toggle="tab"
               href="#data_perumahan" role="tab">Data Perumahan</a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link text-white" id="profile-tab" data-toggle="tab"
               href="#data_sarana" role="tab"
               style="background-color: goldenrod;">Data Sarana</a>
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
        <li class="nav-item ml-1">
            <a class="nav-link text-white " id="contact-tab" data-toggle="tab"
               href="#data_koordinat" role="tab"
               style="background-color: #6f1C00;">Data Koordinat</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="data_perumahan" role="tabpanel">
            @include('PSU_Perumahan.perumahan.perumahan_edit')
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
@endsection
