var a = 0;
$("#add_data_kelurahan").click(function () {
    var kecamatan_id = $('#kecamatan_id').val();
    var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
    var a = jumlah + 1; // Tambah 1 untuk jumlah form nya

    $("#kelurahan-form").append(
        '<div id="data_kelurahan_append" class="row mt-3">'
        + '<div class="col-sm-2">'
        + '<h5>Data Kelurahan Ke ' + a + '</h5>'
        + '</div>'
        + '<div class="col-sm-3">'
        + '<label for="nama_kelurahan">Nama Kelurahan</label><br>'
        + '<input type="text" class="form-control" id="nama" '
        + 'name="data_kelurahan[' + a + '][nama_kelurahan]"'
        + 'placeholder="Nama Kelurahan">'

        + '<input type="hidden" class="form-control" id="nama" '
        + 'name="data_kelurahan[' + 0 + '][kecamatan_id]"'
        + 'placeholder="kecamatan ID" value="' + kecamatan_id + '">'

        + '<input type="hidden" class="form-control" id="demo" '
        + 'name="data_kelurahan[' + a + '][kecamatan_id]"'
        + 'value="' + kecamatan_id + '"></div>'

        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split"'
        + ' id="remove-data-kecamatan">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-trash"></i></span><span class="text">Hapus</span>'
        + '</button>'
        + '</div></div>');
    $("#jumlah-form").val(a); // Ubah value textbox jumlah-form dengan
    // variabel nextfor

    $("#btn-reset-form").click(function () {
        $("#kelurahan-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });

    $(document).on('click', '#remove-data-kecamatan', function () {
        $(this).parents('#data_kelurahan_append').remove();
    });

});


