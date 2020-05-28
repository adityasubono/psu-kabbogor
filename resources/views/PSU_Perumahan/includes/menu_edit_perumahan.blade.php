<nav class="d-inline">
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse"
            data-target="#dataInput{{ $loop->iteration }}">
        <span class="fas fa-info-circle"></span>
    </button>
</nav>
<a href="" data-toggle="modal"
   data-target="#informasi-perumahan{{ $loop->iteration }}">
    {{ $perumahan->nama_perumahan }}
</a>
<div class="collapse bg-light rounded p-2" id="dataInput{{$loop->iteration }}">
    <div id="accordion{{ $loop->iteration }}">
        <div class="card">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#dataperumahan{{ $loop->iteration }}">
                        Data Perumahan
                    </button>
                </h5>
            </div>
            <div id="dataperumahan{{ $loop->iteration }}" class="collapse"
                 data-parent="#accordion{{ $loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/perumahans/edit/{{$perumahan->id}}">Edit Data Perumahan</a>
                </div>
            </div>
        </div>
    </div>


    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#datasarana{{ $loop->iteration }}">
                        Data Sarana
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{$perumahan->r_sarana->count()}}
                    </span>
                </h5>
            </div>

            <div id="datasarana{{ $loop->iteration }}" class="collapse"
                 data-parent="#accordion{{ $loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/saranas/{{ $perumahan->id }}">Kelola Data Sarana</a><br>

                    Data Foto Sarana
                    <span class="badge badge-primary text-right">
                    {{ $perumahan->r_foto_sarana->count() }}
                    </span><br>

                    Data Koordinat Sarana
                    <span class="badge badge-primary text-right">
                    {{ $perumahan->r_koordinat_sarana->count() }}
                    </span><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#datajalansaluran{{ $loop->iteration }}">
                        Data Jalan dan Saluran
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                      {{ $perumahan->r_jalan_saluran->count() }}
                    </span>
                </h5>
            </div>
            <div id="datajalansaluran{{ $loop->iteration }}" class="collapse"
                 data-parent="#accordion{{ $loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/jalansalurans/{{ $perumahan->id}}">Kelola Data Jalan dan Saluran</a><br>

                    Data Foto Jalan Saluran
                    <span class="badge badge-primary text-right">
                    {{ $perumahan->r_foto_jalan_saluran->count() }}
                    </span><br>
                    Data Koordinat Jalan Saluran
                    <span class="badge badge-primary text-right">
                    {{ $perumahan->r_koordinat_jalan_saluran->count() }}
                    </span><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#datataman{{ $loop->iteration }}">
                        Data Taman
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{$perumahan->r_taman->count()}}
                    </span>
                </h5>
            </div>
            <div id="datataman{{ $loop->iteration }}" class="collapse"
                 data-parent="#accordion{{ $loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/tamans/{{ $perumahan->id }}">Kelola Data Taman</a><br>

                    Data Koordinat Taman
                    <span class="badge badge-primary text-right">
                    {{ $perumahan->r_koordinat_taman->count() }}
                    </span><br>
                    Data Foto Jalan Taman
                    <span class="badge badge-primary text-right">
                    {{ $perumahan->r_foto_taman->count() }}
                    </span><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#datakoordinatperumahan{{ $loop->iteration }}">
                        Data Koordinat Perumahan
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{$perumahan->r_koordinat_perumahan->count()}}
                    </span>
                </h5>
            </div>
            <div id="datakoordinatperumahan{{ $loop->iteration }}" class="collapse"
                 data-parent="#accordion{{ $loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/koordinatperumahans/{{ $perumahan->id }}">Kelola Koordinat
                        Perumahan</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#datacctv{{ $loop->iteration }}">
                        Data CCTV Perumahan
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{$perumahan->r_cctv_perumahan->count()}}
                    </span>
                </h5>
            </div>
            <div id="datacctv{{ $loop->iteration }}" class="collapse"
                 data-parent="#accordion{{ $loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/cctvperumahans/{{ $perumahan->id }}">Kelola Data CCTV<br>
                </div>
            </div>
        </div>
    </div>
</div>
