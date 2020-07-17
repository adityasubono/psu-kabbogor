<h5 class="mt-3">Data Taman dan Penghijauan</h5>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link bg-primary text-white active" id="" data-toggle="tab" href="#detail_data_taman_penghijauan" role="tab" aria-controls="home" aria-selected="true">Data Taman</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link bg-success text-white" id="" data-toggle="tab" href="#detail_gambar_penghijauan" role="tab" aria-controls="profile" aria-selected="false">Data Foto/Gambar</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link bg-warning text-white" id="" data-toggle="tab" href="#detail_koordinat_penghijauan" role="tab" aria-controls="contact" aria-selected="false">Data Koordinat</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="detail_data_taman_penghijauan" role="tabpanel" aria-labelledby="home-tab">
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
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
    </div>
    <div class="tab-pane fade" id="detail_gambar_penghijauan" role="tabpanel" aria-labelledby="profile-tab">
        foto_taman
    </div>
    <div class="tab-pane fade" id="detail_koordinat_penghijauan" role="tabpanel" aria-labelledby="contact-tab">
        koordinat_taman
    </div>
</div>