$(document).ready(function() {
    // var a = 0;
    $("#add_data_taman").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var b = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var perumahan_id = $('#perumahan_id').val();
        $("#taman-form").append(
            '<div id="data_taman_append" class="mt-3 rounded">'
            + '<h5><b>Data Taman Ke-' + b + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="perumahan_id"'
            + 'name="data_taman['+ b +'][perumahan_id]" '
            + 'value="'+ perumahan_id +'">'

            + '<label for="nama_taman">Nama Taman </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama_taman"name="data_taman['+ b +'][nama_taman]"'
            + 'placeholder="Masukan Nama Taman" value="">'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="luas_taman">Luas Taman</label><br>'
            + '<input type="number" name="data_taman[' + b + '][luas_taman]" '
            + 'placeholder="Masukan Luas Taman" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="kondisi_taman">Kondisi Taman</label><br>'
            + '<select class="custom-select"'
            + 'id="kondisi_taman" name="data_taman['+ b +'][kondisi_taman]">'
            + ' <option value="">--Pilih Kondisi--</option>'
            + '<option value="Baik">Baik</option>'
            + '<option value="Rusak Ringan">Rusak Ringan</option>'
            + '<option value="Rusak Berat">Rusak Berat</option>'
            + '</select></div>'

            + '<div class="col-sm-3">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split'
            + ' remove-data-taman float-right">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(b); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-taman', function () {
        $(this).parents('#data_taman_append').remove();
    });

    $("#btn-reset-form-taman").click(function(){
        $("#taman-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


