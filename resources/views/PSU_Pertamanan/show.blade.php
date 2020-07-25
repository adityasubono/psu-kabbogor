@extends('layouts/main')

@section('title', 'Halaman Data Pertamanan')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/pertamanan.css') !!}" rel="stylesheet">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Nama Pertamanan: {{$data_pertamanan->nama_taman}}
                    </h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        ID : {{$data_pertamanan->id}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Luas Taman (m2)</td>
                    <td>:</td>
                    <td>{{$data_pertamanan->luas_taman}}</td>
                </tr>
                <tr>
                    <td>Tahun Dibangun</td>
                    <td>:</td>
                    <td>{{$data_pertamanan->tahun_dibangun}} (m2)</td>
                </tr>
                <tr>
                    <td>Lokasi Alamat</td>
                    <td>:</td>
                    <td><b>{{$data_pertamanan->lokasi}}, {{$data_pertamanan->kecamatan}},
                            {{$data_pertamanan->kelurahan}}, RT. {{$data_pertamanan->RT}} /
                            RW. {{$data_pertamanan->RW}}</b></td>
                </tr>
            </table>

            @include('PSU_Pertamanan.detail.petugas')

            @include('PSU_Pertamanan.detail.foto_pertamanan')

            @include('PSU_Pertamanan.detail.pemeliharaan')

            @include('PSU_Pertamanan.detail.softscape')

            @include('PSU_Pertamanan.detail.hardscape')

            @include('PSU_Pertamanan.detail.koordinat_pertamanan')

            @include('PSU_Pertamanan.detail.cctv_pertamanan')

            <hr>
            <table>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$data_pertamanan->keterangan}}</td>
                </tr>
            </table>

            <a href="/pertamanans/" class="btn btn-info btn-icon-split mt-3">
            <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
            </span>
                <span class="text">Kembali</span>
            </a>


        </div>

    </div>
</div>
@endsection
