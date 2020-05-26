$(document).ready(function() {
    // var a = 0;
    $("#add_data_jalan_saluran").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var b = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var perumahan_id = $('#perumahan_id').val();
        $("#jalansaluran-form").append(
            '<div id="data_jalansaluran_append" class="mt-3 rounded">'
            + '<h5><b>Data jalan Saluran Ke-' + b + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="perumahan_id"'
            + 'name="data_jalan_saluran['+ b +'][perumahan_id]" '
            + 'value="'+ perumahan_id +'">'

            + '<label for="nama_sarana">Nama Jalan Saluran </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama"name="data_jalan_saluran['+ b +'][nama_jalan_saluran]"'
            + 'placeholder="Masukan Nama Alat" value="">'
            + '</div>'

            + '<div class="col-sm-2">'
            + '<label for="luas_sarana">Luas Jalan Saluran</label><br>'
            + '<input type="number" name="data_jalan_saluran[' + b + '][luas_jalan_saluran]" '
            + 'placeholder="Masukan Luas" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="kondisi">Kondisi Jalan Saluran</label><br>'
            + '<select class="custom-select"'
            + 'id="kondisi" name="data_jalan_saluran['+ b +'][kondisi_jalan_saluran]">'
            + ' <option value="">--Pilih Kondisi--</option>'
            + '<option value="Baik">Baik</option>'
            + '<option value="Rusak Ringan">Rusak Ringan</option>'
            + '<option value="Rusak Berat">Rusak Berat</option>'
            + '</select></div>'

            + '<div class="col-sm-4">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split mr-2'
            + ' remove-data-jalansaluran">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(b); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-jalansaluran', function () {
        $(this).parents('#data_jalansaluran_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#jalansaluran-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


