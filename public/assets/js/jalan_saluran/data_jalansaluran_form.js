var a = 0;
$("#add_data_jalan_saluran").click(function () {
    ++a;
    var perumahan_id = $('#perumahan_id').val();
    $("#data_jalansaluran").append(
        '<div id="data_jalansaluran_append" class="mt-3 rounded">'
        + '<h5><b>Data Jalan Saluran Ke-'+ a +'</b></h5><hr>'
        + '<div class="row my-3">'
        + '<div class="col-sm-4">'
        + '<input type="hidden" name="data_jalan_saluran[' + a + '][perumahan_id]" '
        + 'value="'+ perumahan_id +'">'
        + '<label for="nama_saran">Nama Jalan dan Saluran</label><br>'
        + '<input type="text" name="data_jalan_saluran[' + a + '][nama_jalan_saluran]" '
        + 'placeholder="Masukan Nama Sarana" '
        + 'class="form-control" /></div>'
        + '<div class="col-sm-3">'
        + '<label for="luas_sarana">Luas Jalan dan Saluran</label><br>'
        + '<input type="number" name="data_jalan_saluran[' + a + '][luas_jalan_saluran]" '
        + 'placeholder="Masukan Luas Sarana"'
        + 'class="form-control" /></div>'
        + '<div class="col-sm-3"> '
        + '<label for="kondisi_sarana">Kondisi Jalan Saluran</label> '
        + '<select class="custom-select" id="operator"'
        + 'name="data_jalan_saluran[' + a + '][kondisi_jalan_saluran]" > '
        + '<option value="">--Pilih Kondisi Jalan Saluran--</option>'
        + '<option value="Baik">Baik</option>'
        + '<option value="Rusak Ringan">Rusak Ringan</option> '
        + '<option value="Rusak Berat">Rusak Berat</option> '
        + '</select></div>'
        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split'
        + ' remove-data-jalansaluran">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-minus"></i></span>'
        + '<span class="text">Hapus</span></button>'
        + '</div></div></div>');
});
$(document).on('click', '.remove-data-jalansaluran', function () {
    $(this).parents('#data_jalansaluran_append').remove();
});
