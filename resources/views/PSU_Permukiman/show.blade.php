@extends('layouts/main')

@section('title', 'Halaman Detail Data Permukiman')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/permukiman.css') !!}" rel="stylesheet">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Nama Tempat Pemakaman Umum (TPU) : {{$data_permukiman->nama_tpu}}
                     </h6>
                </div>
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary text-right">
                        ID : {{$data_permukiman->id}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Luas TPU (m2)</td>
                    <td>:</td>
                    <td>{{$data_permukiman->luas_tpu}}</td>
                </tr>
                <tr>
                    <td>Daya Tampung TPU</td>
                    <td>:</td>
                    <td>{{$data_permukiman->daya_tampung}} (m2)</td>
                </tr>
                <tr>
                    <td>Tahun Digunakan</td>
                    <td>:</td>
                    <td>{{$data_permukiman->tahun_digunakan}} (unit)</td>
                </tr>
                <tr>
                    <td>Lokasi Perumahan</td>
                    <td>:</td>
                    <td><b>{{$data_permukiman->lokasi}}, {{$data_permukiman->kecamatan}},
                            {{$data_permukiman->kelurahan}}, RT. {{$data_permukiman->RT}} /
                            RW. {{$data_permukiman->RW}}</b></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>{{$data_permukiman->status}}</td>
                </tr>
                <tr>
                    <td>Kondisi</td>
                    <td>:</td>
                    <td>{{$data_permukiman->kondisi}}</td>
                </tr>
                <tr>
                    <td>Keterangan Status</td>
                    <td>:</td>
                    <td>{{$data_permukiman->keterangan_status}}</td>
                </tr>
            </table>

            @include('PSU_Permukiman.detail.data_pengelola')

            @include('PSU_Permukiman.detail.data_foto_tpu')


            @include('PSU_Permukiman.detail.data_inventaris')

            @include('PSU_Permukiman.detail.data_koordinat_tpu')

            @include('PSU_Permukiman.detail.data_cctv')

            <hr>
            <table>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$data_permukiman->keterangan}}</td>
                </tr>
            </table>



            <a href="/permukimans/" class="btn btn-info btn-icon-split mt-3">
            <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
            </span>
                <span class="text">Kembali</span>
            </a>


        </div>

    </div>
</div>
@endsection
