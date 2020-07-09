<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Input Data CCTV Perumahan
    </div>
    <form action="/cctvperumahans/store" method="post">
        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-sm-5">
                    <input type="hidden" class="form-control" id="perumahan_id"
                           name="data_cctv[0][perumahan_id]"
                           value="{{$perumahans->id}}">
                    <label for="nama_cctv">Nama CCTV</label><br>
                    <input type="text" class="form-control @error('data_cctv.*.nama_cctv')
                        is-invalid @enderror" id="nama_cctv"
                           name="data_cctv[0][nama_cctv]"
                           placeholder="Masukan Nama CCTV"
                           value="{{ old('data_cctv.*.nama_cctv') }}">
                    @error('data_cctv.*.nama_cctv')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <label for="ip_cctv">IP CCTV</label><br>
                    <input type="text" class="form-control @error('data_cctv.*.ip_cctv')
                                           is-invalid @enderror" id="ip_cctv"
                           name="data_cctv[0][ip_cctv]"
                           placeholder="Masukan IP CCTV"
                           value="{{ old('data_cctv.*.ip_cctv') }}">
                    @error('data_cctv.*.ip_cctv')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="ip_cctv">Aksi</label><br>
                    <button type="button"
                            class="btn btn-success btn-icon-split float-right ml-3"
                            id="add_data_cctv">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </button>

                    <button type="button"
                            class="btn btn-info btn-icon-split float-right"
                            id="btn-reset-form_cctv">
                        <span class="icon text-white-50">
                            <i class="fas fa-sync"></i>
                        </span>
                        <span class="text">Reset</span>
                    </button>
                </div>
            </div>

            <!--                Form CCTV -------->
            <div id="cctv_form"></div>
            <input type="hidden" id="jumlah-form" value="0">
            <!--                Form CCTV -------->

            <button type="submit"
                    class="btn btn-primary btn-icon-split my-3 float-right"
                    id="submit_pengelolah">
                        <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                        </span>
                <span class="text">Simpan</span>
            </button>
        </div>
    </form>
</div>

@include('PSU_Perumahan.cctv.tabel_cctv_perumahan')


<!--Scrpit Data CCTV Form -->
<script type="text/javascript" src="../../assets/js/perumahan/cctv/cctv_form.js"></script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

