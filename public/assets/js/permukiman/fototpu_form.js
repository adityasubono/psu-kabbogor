$(document).ready(function() {
    // var a = 0;
    $("#add_data_foto").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var e = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var permukiman_id = $('#permukiman_id').val();
        $("#fototpu-form").append(
            '<div id="data_foto_append" class="mt-3 rounded">'
            + '<h5><b>Data Upload Foto Ke-' + e + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="permukiman_id"'
            + 'name="data_inventaris['+ e +'][permukiman_id]" '
            + 'value="'+ permukiman_id +'">'

            + '<label for="nama_foto">Nama Foto </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama_foto" name="data_foto['+ e +'][nama_foto]"'
            + 'placeholder="Masukan Nama Foto">'
            + '</div>'

            + '<div class="col-sm-5">'
            + '<label for="file_foto">Upload Foto</label><br>'
            + '<div class="input-group mb-2">'
            + '<div class="input-group-prepend">'
            + '<span class="input-group-text" id="file_foto">Upload</span>'
            + '</div><div class="custom-file">'
            + '<input type="file" class="custom-file-input" id="file_foto"'
            + 'name="file_foto">'
            + '<label class="custom-file-label" for="file_foto">'
            + 'Choose File</label></div></div></div>'

            + '<div class="col-sm-4">'
            + '<label>Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split mr-2'
            + ' remove-data-foto">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(e); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-foto', function () {
        $(this).parents('#data_foto_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#fototpu-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


