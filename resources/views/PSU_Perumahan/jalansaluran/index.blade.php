<div class="card shadow">
    <div class="card-header text-white bg-primary">
        Input Data Jalan Saluran
    </div>
    <div class="card-body" id="data_jalansaluran">
        <form method="post" action="/jalansalurans/store">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <input type="hidden"
                           class="form-control"
                           id="perumahan_id"
                           name="data_jalan_saluran[0][perumahan_id]"
                           value="{{$perumahans->id}}">
                    <label for="nama_jalansaluran">Nama Jalan Saluran</label><br>
                    <input type="text"
                           class="form-control @error('nama_jalan_saluran')
                               is-invalid @enderror" id="nama_jalansaluran"
                           name="data_jalan_saluran[0][nama_jalan_saluran]"
                           placeholder="Masukan Nama Jalan dan Saluran"
                           value="{{ old('nama_jalan_saluran') }}">
                    @error('nama_jalan_saluran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="luas_jalansaluran">Luas Jalan Saluran ( m3 )</label><br>
                    <input type="number"
                           class="form-control @error('luas_jalan_saluran')
                                     is-invalid @enderror" id="luas_jalansaluran"
                           name="data_jalan_saluran[0][luas_jalan_saluran]"
                           placeholder="Luas Jalan dan Saluran ( m3 )"
                           value="{{ old('luas_jalan_saluran') }}">
                    @error('luas_jalan_saluran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="kondisi_jalan_saluran">Kondisi Jalan Saluran</label><br>
                    <select
                        class="custom-select @error('kondisi_jalan_saluran')
                            is-invalid @enderror"
                        id="kondisi_jalan_saluran"
                        name="data_jalan_saluran[0][kondisi_jalan_saluran]"
                        value="{{ old('kondisi_jalan_saluran') }}">
                        <option value="">--Pilih Kondisi Sarana--</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                    @error('kondisi_jalan_saluran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <label for="aksi" class="text-center">Aksi</label><br>
                    <button type="button"
                            class="btn btn-success btn-icon-split float-right ml-3"
                            id="add_data_jalan_saluran">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Tambah</span>
                    </button>
                    <button type="button"
                            class="btn btn-info btn-icon-split float-right"
                            id="btn-reset-jalansaluran">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Reset</span>
                    </button>
                </div>
            </div>
            <input type="hidden" id="jumlah-form" value="0">
            <div id="jalansaluran-form"></div>

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
@include('PSU_Perumahan.jalansaluran.tabel_jalansaluran')

@include('PSU_Perumahan.jalansaluran.foto.tabel_foto_jalan_saluran')
<a href="/koordinatjalansalurans/tampilkanpeta/{{$perumahans->id}}" target="_blank" class="mt-3">
            <span class="icon text-white-50">
                <i class="fas fa-map"></i>
            </span>
    <span class="text">Lihat Data Peta Persebaran Jalan Saluran Perumahan</span>
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
<script type="text/javascript"
        src="../../assets/js/perumahan/jalansaluran/jalansaluran_form.js">
</script>
