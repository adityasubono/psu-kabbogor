<link href="{!! asset('assets/css/permukiman.css') !!}" rel="stylesheet">
<hr>
<h5 class="mt-3">Data Foto Permukiman</h5>
<div class="row">
    @forelse( $data_foto_taman as $foto )
    <div class="col-sm-3">
        <div class="gallery">
            <a href="../../assets/uploads/pertamanan/{{$foto->file_foto}}"
               target="_blank">
                <img src="../../assets/uploads/pertamanan/{{$foto->file_foto}}">
            </a>
            <div class="desc bg-gray-200">{{$foto->nama_foto}}</div>
        </div>
    </div>

    @empty

    <div class="gallery">
        <a href="">
            <img src="../../assets/images/no_picture.jpg" width="600" height="400">
        </a>
        <div class="desc text-danger">Data Belum Tersedia</div>
    </div>
    @endforelse
</div>

