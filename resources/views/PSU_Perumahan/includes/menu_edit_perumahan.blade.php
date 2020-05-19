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
    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#dataperumahan">
                        Data Perumahan
                    </button>
                </h5>
            </div>
            <div id="dataperumahan" class="collapse"
                 data-parent="#accordion">
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
                            data-target="#datasarana">
                        Data Sarana
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$perumahan->r_sarana->count();
                        $b=$perumahan->r_foto_sarana->count();
                        $c=$perumahan->r_koordinat_saranas->count();
                        $total_data=$a+$b+$c;
                        echo "$total_data";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="datasarana" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/saranas/{{ $perumahan->id }}">Kelola Data Sarana</a><br>
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
                            data-target="#datajalansaluran">
                        Data Jalan dan Saluran
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$perumahan->r_jalan_saluran->count();
                        $b=$perumahan->r_foto_jalan_saluran->count();
                        $c=$perumahan->r_koordinat_jalan_saluran->count();
                        $total_data=$a+$b+$c;
                        echo "$total_data";
                        @endphp
                    </span>
                </h5>
            </div>
            <div id="datajalansaluran" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/jalansalurans/{{ $perumahan->id}}">Kelola Data Jalan dan Saluran</a><br>
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
                            data-target="#datataman">
                        Data Taman
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{$perumahan->r_taman->count()}}
                    </span>
                </h5>
            </div>
            <div id="datataman" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/tamans/{{ $perumahan->id }}">Kelola Data Taman</a><br>
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
                            data-target="#datakoordinatperumahan">
                        Data Koordinat Perumahan
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{$perumahan->r_koordinat_perumahan->count()}}
                    </span>
                </h5>
            </div>
            <div id="datakoordinatperumahan" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/saranas/{{ $perumahan->id }}">Kelola Koordinat Perumahan</a><br>
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
                            data-target="#datacctv">
                        Data CCTV Perumahan
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{$perumahan->r_cctv_perumahan->count()}}
                    </span>
                </h5>
            </div>
            <div id="datacctv" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/saranas/{{ $perumahan->id }}">Kelola Data CCTV<br>
                </div>
            </div>
        </div>
    </div>
</div>
