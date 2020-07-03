<div class="card shadow mb-4">

    <div class="card-header bg-primary text-white">
        Input Data Taman dan Penghijauan
    </div>
    <form method="post" action="/tamans/store">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" id="perumahan_id"
                           name="data_taman[0][perumahan_id]"
                           value="{{$perumahans->id}}">

                    <label for="nama_taman">Nama Taman</label><br>
                    <input type="text" class="form-control @error('nama_taman') is-invalid
                                           @enderror" id="nama_taman"
                           name="data_taman[0][nama_taman]"
                           placeholder="Masukan Nama Taman"
                           value="{{ old('nama_taman') }}">
                    @error('nama_taman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="luas_taman">Luas Taman ( m3 )</label><br>
                    <input type="number"
                           class="form-control @error('luas_taman')is-invalid @enderror" id="luas_taman"
                           name="data_taman[0][luas_taman]"
                           placeholder="Luas Taman ( m3 )"
                           value="{{ old('luas_taman') }}">
                    @error('luas_taman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="kondisi_taman">Kondisi Taman</label><br>
                    <select
                        class="custom-select @error('kondisi_taman') is-invalid @enderror"
                        id="kondisi_taman"
                        name="data_taman[0][kondisi_taman]"
                        value="{{ old('kondisi_taman') }}">
                        <option value="">--Pilih Kondisi Taman--</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                    @error('kondisi_sarana')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="aksi">Aksi</label><br>
                    <button type="button"
                            class="btn btn-success btn-icon-split float-right ml-3"
                            id="add_data_taman">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Tambah</span>
                    </button>

                    <button type="button"
                            class="btn btn-info btn-icon-split float-right "
                            id="btn-reset-form-taman">
                            <span class="icon text-white-50">
                                <i class="fas fa-sync"></i>
                            </span>
                        <span class="text">Reset</span>
                    </button>
                </div>
            </div>
            <input type="hidden" id="jumlah-form" value="0">
            <div id="taman-form"></div>

            <button type="submit"
                    class="btn btn-primary btn-icon-split my-3 float-right"
                    id="btn_simpan">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </div>
    </form>
</div>

@include('PSU_Perumahan.taman.tabel_taman')

@include('PSU_Perumahan.taman.foto.tabel_foto_taman')

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
<script type="text/javascript" src="../../assets/js/perumahan/taman/taman_form.js"></script>

