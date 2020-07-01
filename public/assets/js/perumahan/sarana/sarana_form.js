$(document).ready(function() {
    // var a = 0;
    $("#add_data_sarana").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var b = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var perumahan_id = $('#perumahan_id').val();
        $("#sarana-form").append(
            '<div id="data_inventaris_append" class="mt-3 rounded">'
            + '<h5><b>Data Sarana Ke-' + b + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="perumahan_id"'
            + 'name="data_sarana['+ b +'][perumahan_id]" '
            + 'value="'+ perumahan_id +'">'

            + '<label for="nama_sarana">Nama Sarana </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama"name="data_sarana['+ b +'][nama_sarana]"'
            + 'placeholder="Masukan Nama Alat" value="">'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="luas_sarana">Luas Sarana</label><br>'
            + '<input type="number" name="data_sarana[' + b + '][luas_sarana]" '
            + 'placeholder="Masukan Luas Sarana" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="kondisi">Kondisi</label><br>'
            + '<select class="custom-select"'
            + 'id="kondisi" name="data_sarana['+ b +'][kondisi_sarana]">'
            + ' <option value="">--Pilih Kondisi--</option>'
            + '<option value="Baik">Baik</option>'
            + '<option value="Rusak Ringan">Rusak Ringan</option>'
            + '<option value="Rusak Berat">Rusak Berat</option>'
            + '</select></div>'

            + '<div class="col-sm-3">'
            + '<label for="aksi" class="text-center">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split float-right'
            + ' remove-data-inventaris">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(b); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-inventaris', function () {
        $(this).parents('#data_inventaris_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#sarana-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


