$(document).ready(function() {
    // var a = 0;
    $("#add_data_pju").click(function () {
        var jumlah = parseInt($("#jumlah-form-pju").val()); // Ambil jumlah data form pada textbox jumlah-form
        var number = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var perumahan_id = $('#perumahan_id').val();
        $("#pju-form").append(
            '<div id="data_pju_append" class="mt-3 rounded">'
            + '<h5><b>Data Taman Ke-' + number + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="perumahan_id"'
            + 'name="data_pju['+ number +'][perumahan_id]" '
            + 'value="'+ perumahan_id +'">'

            + '<label for="nama_pju">Nama PJU </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama_pju"name="data_pju['+ number +'][nama_pju]"'
            + 'placeholder="Masukan Nama PJU" value="">'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="jumlah_pju">Jumlah PJU</label><br>'
            + '<input type="number" name="data_pju[' + number + '][jumlah]" '
            + 'placeholder="Jumlah PJU" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="kondisi_pju">Kondisi PJU</label><br>'
            + '<select class="custom-select"'
            + 'id="kondisi_pju" name="data_pju['+ number +'][kondisi]">'
            + ' <option value="">--Pilih Kondisi--</option>'
            + '<option value="Baik">Baik</option>'
            + '<option value="Rusak Ringan">Rusak Ringan</option>'
            + '<option value="Rusak Berat">Rusak Berat</option>'
            + '</select></div>'

            + '<div class="col-sm-3">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split'
            + ' remove-data-pju float-right">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form-pju").val(number); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-pju', function () {
        $(this).parents('#data_pju_append').remove();
    });

    $("#btn-reset-form-pju").click(function(){
        $("#pju-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form-pju").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


