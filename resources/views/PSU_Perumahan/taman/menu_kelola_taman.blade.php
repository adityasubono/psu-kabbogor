<nav class="d-inline">
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse"
            data-target="#dataInput{{ $loop->iteration }}">
        <span class="fas fa-info-circle"></span>
    </button>
</nav>
<a href="" data-toggle="modal"
   data-target="#informasi-perumahan{{ $loop->iteration }}">
    {{ $taman->nama_taman }}
</a>
<div class="collapse bg-light rounded p-2" id="dataInput{{$loop->iteration }}" style="width: 250px">
    <div id="accordion{{$loop->iteration }}">
        <div class="card" style="width: 235px">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#dataperumahan{{$loop->iteration }}">
                        Kelola Data Taman
                    </button>
                </h5>
            </div>
            <div id="dataperumahan{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion{{$loop->iteration }}">
                <div class="card-body p-3">
                    <a href="/koordinattamans/{{$taman->id}}">Tambah Koordinat Taman</a><br>
                    <a href="/fototamans/{{$taman->id}}">Tambah Foto Taman</a>
                </div>
            </div>
        </div>
    </div>
</div>