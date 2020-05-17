var c = 0;
$("#add_data_taman").click(function () {
    ++c;
    var perumahan_id = $('#perumahan_id').val();
    $("#data_taman").append(
        '<div id="data_sarana_append" class="mt-3 rounded">'
        + '<h5><b>Data Taman Ke-'+ c +'</b></h5><hr>'
        + '<div class="row my-3">'
        + '<div class="col-sm-4">'
        + '<input type="hidden" name="data_taman[' + c + '][perumahan_id]" '
        + 'value="'+ perumahan_id +'">'
        + '<label for="nama_taman">Nama Taman</label><br>'
        + '<input type="text" name="data_taman[' + c + '][nama_taman]" '
        + 'placeholder="Masukan Nama Taman" '
        + 'class="form-control" /></div>'
        + '<div class="col-sm-3">'
        + '<label for="luas_taman">Luas Taman</label><br>'
        + '<input type="number" name="data_taman[' + c + '][luas_taman]" '
        + 'placeholder="Masukan Luas Taman"'
        + 'class="form-control" /></div>'
        + '<div class="col-sm-3"> '
        + '<label for="kondisi_taman">Kondisi Taman</label> '
        + '<select class="custom-select" id="kondisi_taman"  '
        + 'name="data_taman[' + c + '][kondisi_taman]" > '
        + '<option value="">--Pilih Kondisi Taman--</option>'
        + '<option value="Baik">Baik</option>'
        + '<option value="Rusak Ringan">Rusak Ringan</option> '
        + '<option value="Rusak Berat">Rusak Berat</option> '
        + '</select></div>'
        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split'
        + ' remove-data-taman">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-minus"></i></span>'
        + '<span class="text">Hapus</span></button>'
        + '</div></div></div>');
});
$(document).on('click', '.remove-data-taman', function () {
    $(this).parents('#data_sarana_append').remove();
});
