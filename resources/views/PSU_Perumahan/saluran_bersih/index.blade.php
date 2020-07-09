<div class="card shadow">
    <div class="card-header text-white bg-primary">
        Input Data Saluran Bersih
    </div>
    <div class="card-body" id="data_jalansaluran">
        <form method="post" action="/saluranbersih/store">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <input type="hidden"
                           class="form-control"
                           id="perumahan_id"
                           name="data_saluran[0][perumahan_id]"
                           value="{{$perumahans->id}}">
                    <label for="nama_saluran">Nama Saluran Bersih</label><br>
                    <input type="text"
                           class="form-control @error('nama_saluran')is-invalid @enderror"
                           id="nama_saluran"
                           name="data_saluran[0][nama_saluran]"
                           placeholder="Masukan Nama Saluran"
                           value="{{ old('nama_saluran') }}">
                    @error('nama_saluran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="jumlah">Jumlah Saluran Bersih</label><br>
                    <input type="number"
                           class="form-control @error('jumlah')is-invalid @enderror"
                           id="jumlah"
                           name="data_saluran[0][jumlah]"
                           placeholder="Masukan Jumlah Saluran Bersih"
                           value="{{ old('jumlah') }}">
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="kondisi_saluran">Kondisi Saluran Bersih</label><br>
                    <select
                        class="custom-select @error('kondisi_pju')
                            is-invalid @enderror"
                        id="kondisi_saluran"
                        name="data_saluran[0][kondisi_saluran]"
                        value="{{ old('kondisi_saluran') }}">
                        <option value="">--Pilih Kondisi Saluran--</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                    @error('kondisi_saluran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="aksi" class="text-center">Aksi</label><br>
                    <button type="button"
                            class="btn btn-success btn-icon-split float-right ml-3"
                            id="add_data_saluran_bersih">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Tambah</span>
                    </button>
                    <button type="button"
                            class="btn btn-info btn-icon-split float-right"
                            id="btn_reset_saluran_bersih">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Reset</span>
                    </button>
                </div>
            </div>
            <input type="hidden" id="jumlah_saluran_bersih_form" value="0">
            <div id="saluran_bersih_form"></div>

            <button type="submit"
                    class="btn btn-primary btn-icon-split mt-3 float-right"
                    id="add_data_saluran_bersih">
            <span class="icon text-white-50">
                <i class="fas fa-download"></i>
            </span>
                <span class="text">Simpan</span>
            </button>
        </form>
    </div>
</div>
@include('PSU_Perumahan.saluran_bersih.tabel_saluran')

<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>

<!--Scrpit Data Sarana -->
<script type="text/javascript"
        src="../../assets/js/perumahan/saluranbersih/saluranbersih.js">
</script>
