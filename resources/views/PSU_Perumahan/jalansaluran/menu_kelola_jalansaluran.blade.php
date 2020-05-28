<nav class="d-inline">
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse"
            data-target="#dataInput{{ $loop->iteration }}">
        <span class="fas fa-info-circle"></span>
    </button>
</nav>
    {{ $jalansaluran->nama_jalan_saluran }}
<div class="collapse bg-light rounded p-2" id="dataInput{{$loop->iteration }}" style="width: 270px">
    <div id="accordion{{$loop->iteration }}">
        <div class="card" style="width: 265px">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#dataperumahan{{$loop->iteration }}">
                        Kelola Data Jalan Saluran
                    </button>
                </h5>
            </div>
            <div id="dataperumahan{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion{{$loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/koordinatjalansalurans/{{$jalansaluran->id}}">
                        Tambah Koordinat Jalan Saluran</a>
                    <span class="badge badge-primary text-center rata_kanan">
                           {{ $jalansaluran->r_koordinat_jalan_saluran->count() }}
                    </span>
                    <br>
                    <a href="/fotojalansalurans/{{$jalansaluran->id}}">Tambah Foto Jalan Saluran</a>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{ $jalansaluran->r_foto_jalan_saluran->count() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
