<div class="card shadow">
    <div class="card-header text-white bg-primary">
        Input Data PJU
    </div>
    <div class="card-body">
        <form method="post" action="/pjus/store">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <input type="hidden"
                           class="form-control"
                           id="perumahan_id"
                           name="data_pju[0][perumahan_id]"
                           value="{{$perumahans->id}}">
                    <label for="nama_pju">Nama PJU</label><br>
                    <input type="text"
                           class="form-control @error('nama_pju')is-invalid @enderror"
                           id="nama_pju"
                           name="data_pju[0][nama_pju]"
                           placeholder="Masukan Nama PJU"
                           value="{{ old('nama_pju') }}">
                    @error('nama_pju')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="jumlah">Jumlah PJU</label><br>
                    <input type="number"
                           class="form-control @error('jumlah') is-invalid @enderror"
                           id="jumlah"
                           name="data_pju[0][jumlah]"
                           placeholder="Masukan Jumlah"
                           value="{{ old('jumlah') }}">
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="kondisi">Kondisi PJU</label><br>
                    <select
                        class="custom-select @error('kondisi')is-invalid @enderror"
                        id="kondisi"
                        name="data_pju[0][kondisi]"
                        value="{{ old('kondisi') }}">
                        <option value="">--Pilih Kondisi PJU--</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="aksi" class="text-center">Aksi</label><br>
                    <button type="button"
                            class="btn btn-success btn-icon-split float-right ml-3"
                            id="add_data_pju">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Tambah</span>
                    </button>
                    <button type="button"
                            class="btn btn-info btn-icon-split float-right"
                            id="btn-reset-form-pju">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Reset</span>
                    </button>
                </div>
            </div>
            <input type="hidden" id="jumlah-form-pju" value="0">
            <div id="pju-form"></div>

            <button type="submit"
                    class="btn btn-primary btn-icon-split mt-3 float-right"
                    id="add_data_jalan_saluran">
            <span class="icon text-white-50">
                <i class="fas fa-download"></i>
            </span>
                <span class="text">Simpan</span>
            </button>
        </form>
    </div>
</div>
@include('PSU_Perumahan.pju.tabel_pju')

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
        src="../../assets/js/perumahan/pju/pju_form.js">
</script>
