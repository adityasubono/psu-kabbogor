@extends('layouts/main')

@section('title', 'Halaman Rekapitulasi')

@section('container-fluid')
<div class="container-fluid">
    <link href="/assets/css/rekapitulasi.css" rel="stylesheet">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active bg-info text-white" id="nav-home-tab" data-toggle="tab"
               href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Grafik</a>
            <a class="nav-item nav-link  bg-success text-white" id="nav-profile-tab" data-toggle="tab"
               href="#nav-profile" role="tab" aria-controls="nav-profile"
               aria-selected="false">Peta</a>
            <a class="nav-item nav-link bg-warning text-white" id="nav-contact-tab" data-toggle="tab"
               href="#nav-contact" role="tab" aria-controls="nav-contact"
               aria-selected="false">Tabel</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
             aria-labelledby="nav-home-tab">

            <div class="row">
                <div class="col-sm-3">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PSU Perumahan</h6>
                        </div>
                        <div class="card-body">
                            @include('PSU_Rekapitulasi.grafik.grafik_perumahan')
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PSU Pertamanan</h6>
                        </div>
                        <div class="card-body">
                            @include('PSU_Rekapitulasi.grafik.grafik_pertamanan')
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PSU Kawasan Permukiman</h6>
                        </div>
                        <div class="card-body">
                            @include('PSU_Rekapitulasi.grafik.grafik_permukiman')
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kegiatan Fisik</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                @include('PSU_Rekapitulasi.grafik.grafik_kegiatan_fisik')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
             aria-labelledby="nav-profile-tab">

            <!--Google map-->

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Peta Sebaran</h6>
                </div>
                <div class="card-body">
                    @include('PSU_Rekapitulasi.peta.peta_rekap_psu')
                </div>
            </div>

            <!--Google Maps-->

        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
             aria-labelledby="nav-contact-tab">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Rekap</h6>
                </div>
                <div class="card-body">
                  @include('PSU_Rekapitulasi.tabel_data.data_rekap_psu')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
