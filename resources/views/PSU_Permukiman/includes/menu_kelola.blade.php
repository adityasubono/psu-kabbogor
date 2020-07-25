
<nav class="d-inline">
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse"
            data-target="#dataInput{{ $loop->iteration }}">
        <span class="fas fa-info-circle"></span>
    </button>
</nav>
<a href="" data-toggle="modal"
   data-target="#informasi-permukiman{{ $loop->iteration}}">
    {{ $permukiman->nama_tpu }}
</a>
<div class="collapse bg-light rounded p-2" id="dataInput{{$loop->iteration }}">
    <div id="accordion{{$loop->iteration }}">
        <div class="card" style="width: 300px;">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#datapermukiman{{$loop->iteration }}">
                        Data Permukiman
                    </button>
                </h5>
            </div>
            <div id="datapermukiman{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion{{$loop->iteration}}">
                <div class="card-body p-3">
                    <a href="/permukimans/{{$permukiman->id}}/edit">
                        Edit Data Permukiman</a>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card" style="width: 300px;">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#datapengelolah{{$loop->iteration }}">
                        Data Pengelola
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{ $permukiman->r_pengelola->count()}}
                    </span>
                </h5>
            </div>
            <div id="datapengelolah{{$loop->iteration }}" class="collapse" data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/pengelolas/{{ $permukiman->id }}">
                        Kelola Data Pengelola</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card" style="width: 300px;">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#datafototpu{{$loop->iteration }}">
                        Data Foto TPU
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{ $permukiman->r_foto_tpu->count()}}
                    </span>
                </h5>
            </div>
            <div id="datafototpu{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/fototpus/{{ $permukiman->id }}">
                        Kelola Data Foto TPU</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card" style="width: 300px;">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#dataiventaris{{$loop->iteration }}">
                        Data Inventaris
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{ $permukiman->r_inventaris->count()}}
                    </span>
                </h5>
            </div>
            <div id="dataiventaris{{$loop->iteration }}" class="collapse" data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/inventaris/{{ $permukiman->id }}">
                        Kelola Data Inventaris</a><br>
                </div>
            </div>
        </div>
    </div>


    <div id="accordion">
        <div class="card" style="width: 300px;">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#datakoordinattpu{{$loop->iteration }}">
                        Data Koordinat TPU
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                        {{ $permukiman->r_koordinat_tpu->count()}}
                    </span>
                </h5>
            </div>
            <div id="datakoordinattpu{{$loop->iteration }}" class="collapse" data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/koordinattpus/{{ $permukiman->id }}">
                        Kelola Data Koordinat TPU</a><br>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card" style="width: 300px;">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                            data-target="#datacctv{{$loop->iteration }}">
                        Data CCTV
                    </button>
                    <span class="badge badge-primary text-center rata_kanan">
                                        {{ $permukiman->r_cctv_permukiman->count()}}
                                    </span>
                </h5>
            </div>
            <div id="datacctv{{$loop->iteration }}" class="collapse" data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/cctvtpus/{{ $permukiman->id }}">
                        Kelola Data CCTV</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
