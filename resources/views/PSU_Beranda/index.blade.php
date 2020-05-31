@extends('layouts.main')

@section('title', 'Halaman Beranda')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-400">
            <h6 class="m-0 font-weight-bold text-primary">Beranda</h6>
        </div>
        <div class="card-body">


            <a href="/logout" class="btn btn-primary btn-lg">Logout</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Seksi</th>
                        <th>Jumlah Aset</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1.</td>
                        <td><a href="/perumahans">PSU Perumahan</a></td>
                        <td>{{$jml_assets_perumahan}}</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><a href="/pertamanans">PSU Pertamanan</a></td>
                        <td>{{$jml_assets_pertamanan}}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><a href="/permukimans">PSU Kawasan Permukiman</a></td>
                        <td>{{$jml_assets_permukiman}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
