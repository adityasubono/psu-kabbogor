<nav class="d-inline">
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse"
            data-target="#dataInput{{ $loop->iteration }}">
        <span class="fas fa-info-circle"></span>
    </button>
</nav>
<a href="" data-toggle="modal" data-target="#informasi-pertamanan{{ $loop->iteration
}}">
    {{ $pertamanan->nama_taman }}
</a>
<div class="collapse bg-light rounded p-2" id="dataInput{{$loop->iteration }}">
    <div id="accordion">
        <div class="card" style="width: 300px;">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#datapertamanan{{$loop->iteration }}">
                        Data Pertamanan
                    </button>
                </h5>
            </div>
            <div id="datapertamanan{{$loop->iteration }}" class="collapse" data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/pertamanans/edit/{{ $pertamanan->id }}">Edit Data Pertamanan</a>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#datapetugas{{$loop->iteration }}">
                        Data Petugas
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$pertamanan->r_petugas->count();
                        echo "$a";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="datapetugas{{$loop->iteration }}" class="collapse" data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/petugas/{{ $pertamanan->id }}">Kelola Data Petugas</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#data_foto_taman{{$loop->iteration }}">
                        Data Foto Taman
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$pertamanan->r_foto_pertamanan->count();
                        echo "$a";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="data_foto_taman{{$loop->iteration }}" class="collapse" data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/fotopertamanans/{{ $pertamanan->id }}">
                        Kelola Data Foto Pertamanan</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#data_pemelihara{{$loop->iteration }}">
                        Data Peralatan Pemeliharaan
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$pertamanan->r_pemeliharaan->count();
                        echo "$a";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="data_pemelihara{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/pemeliharaans/{{ $pertamanan->id }}">Kelola Data
                        Peralatan Pemeliharaan</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#data_softscape{{$loop->iteration }}">
                        Data Softscape
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$pertamanan->r_softscape->count();
                        echo "$a";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="data_softscape{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/softscapes/{{ $pertamanan->id }}">Kelola Data Softscape</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#data_hardscape{{$loop->iteration }}">
                        Data Hardscape
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$pertamanan->r_hardscape->count();
                        echo "$a";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="data_hardscape{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/hardscapes/{{ $pertamanan->id }}">Kelola Data Hardscape</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#data_koordinat_pertamanan{{$loop->iteration }}">
                        Data Koordinat Pertamanan
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$pertamanan->r_softscape->count();
                        echo "$a";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="data_koordinat_pertamanan{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/koordinatpertamanans/{{ $pertamanan->id }}">
                        Kelola Data Koordinat Pertamanan</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#data_cctv_pertamanan{{$loop->iteration }}">
                        Data CCTV Pertamanan
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        @php
                        $a=$pertamanan->r_cctv_pertamanan->count();
                        echo "$a";
                        @endphp
                    </span>
                </h5>
            </div>

            <div id="data_cctv_pertamanan{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/cctvpertamanans/{{ $pertamanan->id }}">
                        Kelola Data CCTV Pertamaman</a><br>
                </div>
            </div>
        </div>
    </div>




</div>
