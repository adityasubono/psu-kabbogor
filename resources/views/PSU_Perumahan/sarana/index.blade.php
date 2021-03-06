<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Input Data Sarana Perumahan
    </div>
    <form method="post" action="/saranas/store">
        @csrf
        <div class="card-body" id="data_sarana">
            <div class="row">
                <div class="col-sm-3">
                    <input type="hidden" class="form-control" id="perumahan_id"
                           name="data_sarana[0][perumahan_id]"
                           value="{{$perumahans->id}}">

                    <label for="nama_sarana">Nama Sarana</label><br>
                    <input type="text" class="form-control @error('nama_sarana') is-invalid
                                           @enderror" id="nama_sarana"
                           name="data_sarana[0][nama_sarana]"
                           placeholder="Masukan Nama Sarana"
                           value="{{ old('nama_sarana') }}">
                    @error('nama_sarana')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="luas_sarana">Luas Sarana ( m3 )</label><br>
                    <input type="number" class="form-control @error('luas_sarana')
                                           is-invalid @enderror" id="luas_sarana"
                           name="data_sarana[0][luas_sarana]"
                           placeholder="Luas Sarana ( m3 )"
                           value="{{ old('luas_sarana') }}">
                    @error('luas_sarana')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="kondisi_sarana">Kondisi Sarana</label><br>
                    <select
                        class="custom-select @error('kondisi_sarana') is-invalid @enderror"
                        id="kondisi_sarana"
                        name="data_sarana[0][kondisi_sarana]"
                        value="{{ old('kondisi_sarana') }}">
                        <option value="">--Pilih Kondisi Sarana--</option>
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
                    <label for="aksi" class="text-center">Aksi</label><br>
                    <button type="button"
                            class="btn btn-success btn-icon-split float-right ml-3"
                            id="add_data_sarana">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Tambah</span>
                    </button>

                    <button type="button"
                            class="btn btn-info btn-icon-split float-right"
                            id="btn-reset-form">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Reset</span>
                    </button>

                </div>
            </div>
            <input type="hidden" id="jumlah-form" value="0">
            <div id="sarana-form"></div>

            <button type="submit"
                    class="btn btn-primary btn-icon-split mt-3 mb-3
                    float-right"
                    id="btn_simpan">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </div>
    </form>
</div>

<!--    Tabel Data Sarana     -->


<!--    <a href="/tampilpetasemua/peta" class="btn btn-primary btn-icon-split mb-3">-->
<!--        <span class="icon text-white-50">-->
<!--            <i class="fas fa-map"></i>-->
<!--        </span>-->
<!--        <span class="text">Lihat Semua Peta Sarana</span>-->
<!--    </a>-->


@include('PSU_Perumahan.sarana.tabel_sarana')

@include('PSU_Perumahan.sarana.foto.tabel_foto_sarana')

<a href="/koordinatsarana/petasarana/{{$perumahans->id}}" target="_blank">
            <span class="icon text-white-50">
                <i class="fas fa-map"></i>
            </span>
    <span class="text">Lihat Data Peta Persebaran Sarana Perumahan</span>
</a>

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
<script type="text/javascript" src="../../assets/js/perumahan/sarana/sarana_form.js"></script>
<script type="text/javascript" src="../assets/js/sarana/foto_sarana_form.js"></script>


<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
