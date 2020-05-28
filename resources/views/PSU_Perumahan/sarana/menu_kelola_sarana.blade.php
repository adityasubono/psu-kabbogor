
<nav class="d-inline">
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse"
            data-target="#dataInput{{ $loop->iteration }}">
        <span class="fas fa-info-circle"></span>
    </button>
</nav>

    {{ $sarana->nama_sarana }}

<div class="collapse bg-light rounded p-2" id="dataInput{{$loop->iteration }}" style="width: 250px">
    <div id="accordion{{$loop->iteration}}">
        <div class="card" style="width: 235px">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#data{{$loop->iteration }}">
                        Kelola Data Sarana
                    </button>
                </h5>
            </div>
            <div id="data{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion{{$loop->iteration}}">
                <div class="card-body p-3">
                    <a href="/koordinatsarana/{{$sarana->id}}">Tambah Koordinat Sarana</a>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{ $sarana->r_foto_sarana->count() }}
                    </span>
                    <br>
                    <a href="/fotosaranas/{{$sarana->id}}">Tambah Foto Sarana</a>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{ $sarana->r_koordinat_saranas->count() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
