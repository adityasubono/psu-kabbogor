$(document).ready(function() {
    // var a = 0;
    $("#add_data_jalan_saluran").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var b = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var perumahan_id = $('#perumahan_id').val();
        $("#jalansaluran-form").append(
            '<div id="data_jalansaluran_append" class="mt-3">'
            + '<h5><b>Data Koordinat Ke-' + b + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row">'
            + '<div class="col-sm-3">'

            + '<input type="hidden" name="data_jalan_saluran[' + b + '][perumahan_id]" '
            + 'value="'+ perumahan_id +'">'

            + '<label for="nama_jalan_saluran">Nama Jalan Saluran</label><br>'
            + '<input type="text" name="data_jalan_saluran[' + b + '][nama_jalan_saluran]" '
            + 'placeholder="Masukan Nama Sarana" '
            + 'class="form-control"/></div>'

            + '<div class="col-sm-3">'
            + '<label for="luas_jalan_saluran">Luas Jalan Saluran ( m3 )'
            + '( m3 )</label><br>'
            + '<input type="number" name="data_jalan_saluran[' + b + '][luas_jalan_saluran]" '
            + 'placeholder="Masukan Luas Jalan Saluran ( m3 )"'
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

            + '<div class="col-sm-3">'
            + '<label for="aksi" class="text-center">Aksi</label><br> '
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split float-right'
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

    $("#btn-reset-jalansaluran").click(function(){
        $("#jalansaluran-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


