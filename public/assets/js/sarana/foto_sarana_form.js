// var b = 0;

$("#add_data_foto_sarana").click(function () {
    // ++b;
    var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
    var b = jumlah + 1; // Tambah 1 untuk jumlah form nya

    var perumahan_id = $('#perumahan_id').val();
    var sarana_id = $('#sarana_id').val();
    $("#data_foto_sarana").append(''
        + '<div class="row ml-lg-0" id="data_foto_sarana_append">'
        + '<div class="col-sm-5 mb-3">'
        + '<label for="nama_foto">Nama Foto Sarana' + b + '</label><br>'
        + '<input type="text" class="form-control" id="nama_foto" '
        + 'name="foto_sarana[' + b
        + ']nama_foto" placeholder="Masukan Nama Foto"'
        + 'value="">'
        + '<input type="text" class="form-control" id="perumahan_id"'
        + ' name="foto_sarana[' + b + ']perumahan_id" value="' + perumahan_id
        + '">'
        + '<input type="text" class="form-control" id="sarana_id"'
        + ' name="foto_sarana[' + b + ']sarana_id" value="' + sarana_id
        + '">'
        + '</div>'
        + '<div class="col-sm-5">'
        + '<label for="file_foto_sarana">Upload Foto</label><br>'
        + '<div class="input-group mb-2"><div class="input-group-prepend">'
        + '<span class="input-group-text" id="file_foto">Upload</span>'
        + '</div><div class="custom-file">'
        + '<input type="file" class="custom-file-input" id="file_foto_sarana"'
        + 'name="foto_sarana[' + b + ']file_foto">'
        + '<label class="custom-file-label" for="inputGroupFile01">ChooseFile</label>'
        + '</div></div></div>'
        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split"'
        + 'id="remove_data_foto_sarana"><span class="icon text-white-50">'
        + '<i class="fas fa-plus"></i></span><span'
        + ' class="text">Hapus</span></button>'
        + '</div></div>');
    // ++a;
    $("#jumlah-form").val(b);
    // Buat fungsi untuk mereset form ke semula

});

$("#reset_data").click(function () {
    $("#data_foto_sarana_append").html(""); // Kita kosongkan isi dari div insert-form
    $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
});

$(document).on('click', '#remove_data_foto_sarana', function () {
    $(this).parents("#data_foto_sarana_append").remove();
});


