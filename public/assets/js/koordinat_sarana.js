var f = 0;
$("#add_data_koordinat_sarana").click(function () {
    ++f;
    $("#koordinat_sarana").append(
        '<div id="cctv" class="row mt-3 border bg-success p-3'
        + ' mt-3 rounded">' +
        '<h5><b>Data CCTV Ke-'+ f +'</b></h5><hr>'+
        '<div class="col-sm-3">' +
        '<input type="text" name="data_cctv[' + f + '][nama_cctv]"'
        + ' placeholder="Masukan Nama CCTV" ' +
        'class="form-control" /></div>' +
        '<div class="col-sm-3">' +
        '<input type="text" name="data_cctv[' + f + '][nama_cctv]"'
        + ' placeholder="Masukan IP CCTV" ' +
        'class="form-control" /></div>' +
        '<div class="col-sm-2">' +
        '<button type="button" class="btn btn-danger btn-icon-split remove-data-cctv" ' +
        'id="add_data_cctv">' +
        '<span class="icon text-white-50"><i class="fas fa-minus"></i></span>' +
        '<span class="text">Hapus</span></button>' +
        '</div></div></div>');
});
$(document).on('click', '.remove-data-cctv', function () {
    $(this).parents('#cctv').remove();
});
