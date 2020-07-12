var a = 0;
$("#add_data_sarana").click(function () {
    ++a;
    var perumahan_id = $('#perumahan_id').val();
    $("#data_sarana").append(
        '<div id="data_sarana_append" class="mt-3 rounded">'
        + '<h5><b>Data Sarana Ke-'+ a +'</b></h5><hr>'
        + '<div class="row my-3">'
        + '<div class="col-sm-4">'
        + '<input type="hidden" name="data_sarana[' + a + '][perumahan_id]" '
        + 'value="'+ perumahan_id +'">'
        + '<label for="nama_saran">Nama Sarana</label><br>'
        + '<input type="text" name="data_sarana[' + a + '][nama_sarana]" '
        + 'placeholder="Masukan Nama Sarana" '
        + 'class="form-control" /></div>'
        + '<div class="col-sm-3">'
        + '<label for="luas_sarana">Luas Sarana</label><br>'
        + '<input type="number" name="data_sarana[' + a + '][luas_sarana]" '
        + 'placeholder="Masukan Luas Sarana"'
        + 'class="form-control" /></div>'
        + '<div class="col-sm-3"> '
        + '<label for="kondisi_sarana">Kondisi Sarana</label> '
        + '<select class="custom-select" id="operator"  '
        + 'name="data_sarana[' + a + '][kondisi_sarana]" > '
        + '<option value="">--Pilih Kondisi Sarana--</option>'
        + '<option value="Baik">Baik</option>'
        + '<option value="Rusak Ringan">Rusak Ringan</option> '
        + '<option value="Rusak Berat">Rusak Berat</option> '
        + '</select></div>'
        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split'
        + ' remove-data-sarana">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-minus"></i></span>'
        + '<span class="text">Hapus</span></button>'
        + '</div></div></div>'
        + '<button type="submit" class="btn btn-primary btn-icon-split"'
        + 'id="add_data_sarana">'
        + '<span class="icon text-white-50"><i class="fas fa-save"></i></span>'
        + '<span class="text">Input</span></button>');
});
$(document).on('click', '.remove-data-sarana', function () {
    $(this).parents('#data_sarana_append').remove();
});
