@extends('layouts/main')

@section('title', 'Web Rekapitulasi')

@section('container-fluid')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gray-500">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Rekapitulasi PSU Perumahan</h6>
                </div>
                <div class="card-body">
                    @include('PSU_Perumahan.rekapitulasi.grafik.grafik_perumahan')
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gray-500">
                    <h6 class="m-0 font-weight-bold text-primary">Data Persebaran Peta Perumahan</h6>
                </div>
                <div class="card-body">
                    @include('PSU_Perumahan.rekapitulasi.peta.peta_perumahan')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
