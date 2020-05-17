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
                    @if(($data_perumahan->status_perumahan) ==='Sudah')
                    <td><b style="color: green">Sudah Serah Terima</b></td>
                    @elseif(($data_perumahan->status_perumahan) ==='Belum')
                    <td><b style="color: orange">Belum Serah Terima</b></td>
                    @elseif(($data_perumahan->status_perumahan) ==='Terlantar')
                    <td><b style="color: red">Terlantar</b></td>
                    @endif
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


            <h5 class="mt-3">Data Sarana</h5>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Sarana</th>
                    <th scope="col">Luas Sarana</th>
                    <th scope="col">Kondisi Sarana</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_sarana as $sarana )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$sarana->nama_sarana}}</td>
                    <td>{{$sarana->luas_sarana}}</td>
                    <td>{{$sarana->kondisi_sarana}}</td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
                        Tersedia</th>
                </tr>
                @endforelse
                </tbody>
            </table>

            <h5 class="mt-3">Data Jalan dan Saluran</h5>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Jalan dan Saluran</th>
                    <th scope="col">Luas Jalan dan Saluran</th>
                    <th scope="col">Kondisi Jalan dan Saluran</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_jalan_saluran as $jalan_saluran )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$jalan_saluran->nama_jalan_saluran}}</td>
                    <td>{{$jalan_saluran->luas_jalan_saluran}}</td>
                    <td>{{$jalan_saluran->kondisi_jalan_saluran}}</td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
                        Tersedia</th>
                </tr>
                @endforelse
                </tbody>
            </table>


            <h5 class="mt-3">Data Taman</h5>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Taman</th>
                    <th scope="col">Luas Taman</th>
                    <th scope="col">Kondisi Taman</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_taman as $taman )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$taman->nama_taman}}</td>
                    <td>{{$taman->luas_taman}}</td>
                    <td>{{$taman->kondisi_taman}}</td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
                        Tersedia</th>
                </tr>
                @endforelse
                </tbody>
            </table>

            <h5 class="mt-3">Data Koordinat Perumahan</h5>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Koordinat Longitude</th>
                    <th scope="col">Koordinat Latitude</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_koordinat_perumahan as $koordinat_perumahan )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$koordinat_perumahan->longitude}}</td>
                    <td>{{$koordinat_perumahan->latitude}}</td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
                        Tersedia</th>
                </tr>
                @endforelse
                </tbody>
            </table>


            <h5 class="mt-3">Data CCTV</h5>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama CCTV</th>
                    <th scope="col">IP Camera</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_cctv as $cctv )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$cctv->nama_cctv}}</td>
                    <td>{{$cctv->ip_camera}}</td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
                        Tersedia</th>
                </tr>
                @endforelse
                </tbody>
            </table>

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
