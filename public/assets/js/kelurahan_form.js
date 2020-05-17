var a = 0;
$("#add_data_kelurahan").click(function () {
    ++a;
    var kecamatan_id = $('#kecamatan_id').val();
    $("#data_kelurahan").append(
        '<div id="cctv">' +
        '<div class="row m-3">' +
        '<div class="col-sm-7">'
        + '<label for="nama_kelurahan">Nama Kelurahan</label><br>'
        + '<input type="text" class="form-control" id="nama" '
        + 'name="data_kelurahan[' + a + '][nama_kelurahan]"'
        + 'placeholder="Nama Kelurahan">'
        + '<input type="hidden" class="form-control" id="nama" '
        + 'name="data_kelurahan['+ 0 +'][kecamatan_id]"'
        + 'placeholder="kecamatan ID" value="' + kecamatan_id + '">'
        + '<input type="hidden" class="form-control" id="demo" '
        + 'name="data_kelurahan[' + a + '][kecamatan_id]"'
        + 'value="' + kecamatan_id + '"></div>'
        + '<div class="col-sm-4">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split remove-data-kecamatan"'
        + ' id="add_data_cctv">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-plus"></i></span><span class="text">Hapus</span>'
        + '</button></div>'
        + '</div>');
});

$(document).on('click', '.remove-data-kecamatan', function () {
    $(this).parents('#cctv').remove();
});
