<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header text-white bg-primary mt-3">
            Detail Informasi Perumahan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table>
                        <tr>
                            <td>Nama Perumahan</td>
                            <td>:</td>
                            <td><b>{{$perumahans->nama_perumahan}}</b></td>
                        </tr>
                        <tr>
                            <td>Nama Pengembang</td>
                            <td>:</td>
                            <td>{{$perumahans->nama_pengembang}}</td>
                        </tr>
                        <tr>
                            <td>Luas Perumahan</td>
                            <td>:</td>
                            <td>{{$perumahans->luas_perumahan}} (m2)</td>
                        </tr>
                        <tr>
                            <td>Jumlah Rumah</td>
                            <td>:</td>
                            <td>{{$perumahans->jumlah_perumahan}} (unit)</td>
                        </tr>
                        <tr>
                            <td>Lokasi Perumahan</td>
                            <td>:</td>
                            <td><b>{{$perumahans->lokasi}}, {{$perumahans->kecamatan}},
                                    {{$perumahans->kelurahan}}</b></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>{{$perumahans->status_perumahan}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-6">
                    Data BAST <br>
                    Data BASTA <br>
                    Data Izin Lokasi <br>
                    Data IPPT <br>
                    Data Siteplan <br>
                </div>
            </div>



            @include('PSU_Perumahan.detail_data_perumahan.sarana')

            @include('PSU_Perumahan.detail_data_perumahan.jalansaluran')

            @include('PSU_Perumahan.detail_data_perumahan.taman')

            @include('PSU_Perumahan.detail_data_perumahan.bast')

            @include('PSU_Perumahan.detail_data_perumahan.basta')

            @include('PSU_Perumahan.detail_data_perumahan.izin_lokasi')

            @include('PSU_Perumahan.detail_data_perumahan.ippt')

            @include('PSU_Perumahan.detail_data_perumahan.sk_siteplan')

            @include('PSU_Perumahan.detail_data_perumahan.pju')

            @include('PSU_Perumahan.detail_data_perumahan.saluran_bersih')

            @include('PSU_Perumahan.detail_data_perumahan.koordinat_perumahan')

            @include('PSU_Perumahan.detail_data_perumahan.cctv_perumahan')

            <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#confirm-delete" data-backdrop="static" data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Print</span>
            </button>
        </div>
    </div>
</div>