var b = 0;
$("#add_jalan_saluran").click(function () {
    ++b;
    var perumahan_id = $('#perumahan_id').val();
    $("#data_jalan_saluran").append(
        '<div id="data_sarana_append" class="mt-3 rounded">'
        + '<h5><b>Data Jalan Saluran Ke-'+ b +'</b></h5><hr>'
        + '<div class="row my-3">'
        + '<div class="col-sm-4">'
        + '<input type="hidden" name="data_jalan_saluran[' + b + '][perumahan_id]" '
        + 'value="'+ perumahan_id +'">'

        + '<label for="nama_jalan_saluran">Nama Jalan Saluran</label><br>'
        + '<input type="text" name="data_jalan_saluran[' + b + '][nama_jalan_saluran]" '
        + 'placeholder="Masukan Nama Sarana" '
        + 'class="form-control" /></div>'

        + '<div class="col-sm-3">'
        + '<label for="luas_jalan_saluran">Luas Jalan Saluran</label><br>'
        + '<input type="number" name="data_jalan_saluran[' + b + '][luas_jalan_saluran]" '
        + 'placeholder="Masukan Luas Jalan Saluran"'
        + 'class="form-control" /></div>'

        + '<div class="col-sm-3"> '
        + '<label for="kondisi_jalan_saluran">Kondisi Jalan Saluran</label> '
        + '<select class="custom-select" id="operator"  '
        + 'name="data_jalan_saluran[' + b + '][kondisi_jalan_saluran]" > '
        + '<option value="">--Pilih Kondisi Jalan Saluran--</option>'
        + '<option value="Baik">Baik</option>'
        + '<option value="Rusak Ringan">Rusak Ringan</option> '
        + '<option value="Rusak Berat">Rusak Berat</option> '
        + '</select></div>'
        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split'
        + ' remove-data-jalan-saluran">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-minus"></i></span>'
        + '<span class="text">Hapus</span></button>'
        + '</div></div></div>');
});
$(document).on('click', '.remove-data-jalan-saluran', function () {
    $(this).parents('#data_sarana_append').remove();
});
