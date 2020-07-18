<h5 class="mt-3">Data Sarana</h5>
<a href="/koordinatsarana/petasarana/{{$perumahans->id}}" class="btn btn-info btn-icon-split my-3">
    <span class="icon text-white-50">
        <i class="fas fa-map"></i>
    </span>
    <span class="text">Lihat Data Peta Persebaran Sarana Perumahan</span>
</a>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link bg-primary text-white active" id="home-tab" data-toggle="tab" href="#data_detail_sarana" role="tab">Data Sarana</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-success text-white" id="profile-tab" data-toggle="tab" href="#data_detail_foto_sarana" role="tab">Data Foto/Gambar</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="data_detail_sarana" role="tabpanel" aria-labelledby="home-tab">

        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
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
    </div>
    <div class="tab-pane fade" id="data_detail_foto_sarana" role="tabpanel" aria-labelledby="profile-tab">
        @include('PSU_Perumahan.detail_data_perumahan.detail_foto_sarana')
    </div>
</div>
