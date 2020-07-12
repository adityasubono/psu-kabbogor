var e = 0;
$("#add_data_cctv").click(function () {
    ++e;
    var perumahan_id = $('#perumahan_id').val();
    $("#data_cctv").append(
        '<div id="data_sarana_append" class="mt-3 rounded">'
        + '<h5><b>Data CCTV Ke-'+ e +'</b></h5><hr>'
        + '<div class="row my-3">'
        + '<div class="col-sm-4">'
        + '<input type="hidden" name="data_cctv[' + e + '][perumahan_id]" '
        + 'value="'+ perumahan_id +'">'
        + '<label for="nama_cctv">Nama CCTV</label><br>'
        + '<input type="text" name="data_cctv[' + e + '][nama_cctv]" '
        + 'placeholder="Masukan Nama CCTV" '
        + 'class="form-control" /></div>'
        + '<div class="col-sm-4">'
        + '<label for="ip_camera">IP Camera</label><br>'
        + '<input type="text" name="data_cctv[' + e + '][ip_camera]" '
        + 'placeholder="Masukan IP Camera"'
        + 'class="form-control" /></div>'
        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split'
        + ' remove-data-cctv">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-minus"></i></span>'
        + '<span class="text">Hapus</span></button>'
        + '</div></div></div>');
});
$(document).on('click', '.remove-data-cctv', function () {
    $(this).parents('#data_sarana_append').remove();
});
