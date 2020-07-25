$(document).ready(function() {
    // var a = 0;
    $("#add_data_saluran_bersih").click(function () {
        var jumlah = parseInt($("#jumlah_saluran_bersih_form").val()); // Ambil jumlah
        // data form pada textbox jumlah-form
        var number = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var perumahan_id = $('#perumahan_id').val();
        $("#saluran_bersih_form").append(
            '<div id="data_saluran_bersih_append" class="mt-3 rounded">'
            + '<h5><b>Data Taman Ke-' + number + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="perumahan_id"'
            + 'name="data_saluran['+ number +'][perumahan_id]" '
            + 'value="'+ perumahan_id +'">'

            + '<label for="nama_saluran">Nama Saluran Bersih </label><br>'
            + '<input type="text" class="form-control"'
            + ' id="nama_saluran" name="data_saluran['+ number +'][nama_saluran]"'
            + ' placeholder="Masukan Nama Saluran Bersih" value="">'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="jumlah">Jumlah PJU</label><br>'
            + '<input type="number" name="data_saluran[' + number + '][jumlah]" '
            + 'placeholder="Jumlah Saluran Bersih " class="form-control">'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="kondisi">Kondisi PJU</label><br>'
            + '<select class="custom-select"'
            + ' id="kondisi" name="data_saluran['+ number +'][kondisi]">'
            + ' <option value="">--Pilih Kondisi--</option>'
            + '<option value="Baik">Baik</option>'
            + '<option value="Rusak Ringan">Rusak Ringan</option>'
            + '<option value="Rusak Berat">Rusak Berat</option>'
            + '</select></div>'

            + '<div class="col-sm-3">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split'
            + ' remove-data-saluran float-right">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah_saluran_bersih_form").val(number); // Ubah value textbox jumlah-form
        // dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-saluran', function () {
        $(this).parents('#data_saluran_bersih_append').remove();
    });

    $("#btn_reset_saluran_bersih").click(function(){
        $("#saluran_bersih_form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah_saluran_bersih_form").val("0"); // Ubah kembali value jumlah form
        // menjadi 1
    });
});


