<h5 class="mt-3">Data Jalan dan Saluran</h5>


<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link bg-primary text-white active" id="home-tab" data-toggle="tab" href="#data_detail_jalan_saluran" role="tab" aria-controls="home" aria-selected="true">Data Jalan Saluran</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link bg-success text-white" id="profile-tab" data-toggle="tab" href="#data_detail_foto_jalan_saluran" role="tab" aria-controls="profile" aria-selected="false">Data Foto/Gambar</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="data_detail_jalan_saluran" role="tabpanel" aria-labelledby="home-tab">
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
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
        <a href="/koordinatsarana/petasarana/{{$perumahans->id}}">
            <span class="icon text-white-50">
                <i class="fas fa-map"></i>
            </span>
            <span class="text">Lihat Data Peta Persebaran Jalan Saluran Perumahan</span>
        </a>
    </div>
    <div class="tab-pane fade" id="data_detail_foto_jalan_saluran" role="tabpanel" aria-labelledby="profile-tab">
        @include('PSU_Perumahan.detail_data_perumahan.detail_foto_jalan_saluran')
    </div>
</div>
