<h5 class="mt-3">Status Perumahan</h5>
<div class="row">
    <div class="col-1">
        <div class="bg-success kotak">
        </div>
    </div>
    <div class="col-3">
        <label><i>Status : Sudah Serah Terima</i></label>
    </div>

    <div class="col-1">
        <div class="bg-warning kotak">

        </div>
    </div>
    <div class="col-3">
        <label><i>Status : Belum Serah Terima</i></label>
    </div>


    <div class="col-1">
        <div class="bg-danger kotak">
        </div>
    </div>
    <div class="col-3">
        <label><i>Status : Terlantar</i></label>
    </div>
</div>


<div class="row mt-3">
    <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Status : <br>Sudah Serah Terima
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Total Data : {{$status_sudah}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Status : <br> Belum Serah Terima
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Total Data : {{$status_belum}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Status : <br>Terlantar
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Total Data : {{$status_terlantar}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Data Masuk
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800 text-center">
                            {{$total_perumahan}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
