@extends('layouts/main')

@section('title', 'Informasi Detail Perumahan')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Detail Informasi Perumahan</h6>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Nama Perumahan</td>
                    <td>:</td>
                    <td><b>{{$data_perumahan->nama_perumahan}}</b></td>
                </tr>
                <tr>
                    <td>Nama Pengembang</td>
                    <td>:</td>
                    <td>{{$data_perumahan->nama_pengembang}}</td>
                </tr>
                <tr>
                    <td>Luas Perumahan</td>
                    <td>:</td>
                    <td>{{$data_perumahan->luas_perumahan}} (m2)</td>
                </tr>
                <tr>
                    <td>Jumlah Rumah</td>
                    <td>:</td>
                    <td>{{$data_perumahan->jumlah_perumahan}} (unit)</td>
                </tr>
                <tr>
                    <td>Lokasi Perumahan</td>
                    <td>:</td>
                    <td><b>{{$data_perumahan->lokasi}}, {{$data_perumahan->kecamatan}},
                           {{$data_perumahan->kelurahan}}, RT. {{$data_perumahan->RT}} /
                            RW. {{$data_perumahan->RW}}</b></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>{{$data_perumahan->status_perumahan}}</td>
                </tr>
                <tr>
                    <td>Tanggal Serah Terima</td>
                    <td>:</td>
                    @if(!empty($data_perumahan->tgl_serah_terima))
                    <td>{{$data_perumahan->tgl_serah_terima}}</td>
                    @else
                    <td> - </td>
                    @endif
                </tr>
                <tr>
                    <td>No. Berita Acara Serah Terima</td>
                    <td>:</td>
                    @if(!empty($data_perumahan->no_bast))
                    <td>{{$data_perumahan->no_bast}}</td>
                    @else
                    <td> - </td>
                    @endif
                </tr>
                <tr>
                    <td>No. SPH</td>
                    <td>:</td>
                    @if(!empty($data_perumahan->sph))
                    <td>{{$data_perumahan->sph}}</td>
                    @else
                    <td> - </td>
                    @endif
                </tr>
            </table>


            @include('PSU_Perumahan.detail_data_perumahan.sarana')

            @include('PSU_Perumahan.detail_data_perumahan.jalansaluran')

            @include('PSU_Perumahan.detail_data_perumahan.taman')

            @include('PSU_Perumahan.detail_data_perumahan.koordinat_perumahan')

            @include('PSU_Perumahan.detail_data_perumahan.cctv_perumahan')




            <a href="/perumahans/" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </span>
                <span class="text">Kembali</span>
            </a>

            <button class="btn btn-primary btn-icon-split" data-toggle="modal"
                    data-target="#confirm-delete" data-backdrop="static"
                    data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                            </span>
                <span class="text">Print</span>
            </button>
        </div>

    </div>
</div>
@endsection
