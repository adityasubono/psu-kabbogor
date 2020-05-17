<h5 class="mt-3">Status Permukiman</h5>
<div class="row">
    <div class="col-1">
        <div class="bg-success kotak">
        </div>
    </div>
    <div class="col-3">
        <label><i>Status : Sudah Beroperasional</i></label>
    </div>

    <div class="col-1">
        <div class="bg-danger kotak">

        </div>
    </div>
    <div class="col-3">
        <label><i>Status : Belum Beroperasional</i></label>
    </div>
</div>

<div class="row mt-3">
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Sudah Beroperasional
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

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Belum Beroperasional
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


    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Data Masuk
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Total Data : {{ $permukimans->count()}}
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
