<nav class="d-inline">
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse"
            data-target="#dataInput{{ $loop->iteration }}">
        <span class="fas fa-info-circle"></span>
    </button>
</nav>
<a href="" data-toggle="modal"
   data-target="#informasi-perumahan{{ $loop->iteration }}">
    {{ $sarana->nama_sarana }}
</a>
<div class="collapse bg-light rounded p-2" id="dataInput{{$loop->iteration }}" style="width: 250px">
    <div id="accordion">
        <div class="card">
            <div class="card-header bg-gray-200 p-0" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link"
                            data-toggle="collapse"
                            data-target="#dataperumahan{{$loop->iteration }}">
                        Data Perumahan
                    </button>
                </h5>
            </div>
            <div id="dataperumahan{{$loop->iteration }}" class="collapse"
                 data-parent="#accordion">
                <div class="card-body p-3">
                    <a href="/koordinatsaranans/edit/{{$sarana->id}}">Tambah Koordinat Sarana</a><br>
                    <a href="/fotosaranans/edit/{{$sarana->id}}">Tambah Foto Sarana</a>
                </div>
            </div>
        </div>
    </div>
</div>
