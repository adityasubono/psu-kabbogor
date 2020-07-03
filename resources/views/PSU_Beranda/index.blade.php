@extends('layouts.main')

@section('title', 'Halaman Beranda')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
           Beranda {{Session::get('nama_rule')}}
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th>No.</th>
                        <th>Nama Aplikasi</th>
                        <th>Jumlah Aset</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::get('nama_rule') == 'Administrator')
                    <tr>
                        <td>1.</td>
                        <td><a href="/perumahans">PSU Perumahan</a></td>
                        <td>{{$jml_assets_perumahan}}</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><a href="/permukimans">PSU Kawasan Permukiman</a></td>
                        <td>{{$jml_assets_permukiman}}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><a href="/pertamanans">PSU Pertamanan</a></td>
                        <td>{{$jml_assets_pertamanan}}</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td><a href="#">Kegiatan Fisik</a></td>
                        <td>-</td>
                    </tr>

                    @endif

                    @if(Session::get('nama_rule') == 'Operator PSU Perumahan')
                    <tr>
                        <td>1.</td>
                        <td><a href="/perumahans">PSU Perumahan</a></td>
                        <td>{{$jml_assets_perumahan}}</td>
                    </tr>
                    @endif

                    @if(Session::get('nama_rule') == 'Operator PSU Pertamanan')
                    <tr>
                        <td>1.</td>
                        <td><a href="/pertamanans">PSU Pertamanan</a></td>
                        <td>{{$jml_assets_pertamanan}}</td>
                    </tr>
                    @endif

                    @if(Session::get('nama_rule') == 'Operator PSU Kawasan Permukiman')
                    <tr>
                        <td>1.</td>
                        <td><a href="/permukimans">PSU Kawasan Permukiman</a></td>
                        <td>{{$jml_assets_permukiman}}</td>
                    </tr>
                    @endif

                    @if(Session::get('nama_rule') == 'Kegiatan Fisik')
                    <tr>
                        <td>1.</td>
                        <td><a href="#">Kegiatan Fisik</a></td>
                        <td>-</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div style="height: 180px;"></div>

@endsection
