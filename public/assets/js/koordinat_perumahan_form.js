var d = 0;
$("#add_data_koordinat_perumahan").click(function () {
    ++d;
    var perumahan_id = $('#perumahan_id').val();
    $("#data_koordinat_perumahan").append(
        '<div id="data_sarana_append" class="mt-3 rounded">'
        + '<h5><b>Data Koordinat Perumahan Ke-'+ d +'</b></h5><hr>'
        + '<div class="row my-3">'
        + '<div class="col-sm-4">'
        + '<input type="hidden" name="data_koordinat[' + d + '][perumahan_id]" '
        + 'value="'+ perumahan_id +'">'
        + '<label for="longitude">Koordinat Longitude</label><br>'
        + '<input type="text" name="data_koordinat[' + d + '][longitude]" '
        + 'placeholder="Masukan Koordinat Longitude" '
        + 'class="form-control" /></div>'
        + '<div class="col-sm-4">'
        + '<label for="longitude">Koordinat Latitude</label><br>'
        + '<input type="text" name="data_koordinat[' + d + '][latitude]" '
        + 'placeholder="Masukan Koordinat Latitude"'
        + 'class="form-control" /></div>'
        + '<div class="col-sm-2">'
        + '<label for="aksi">Aksi</label><br>'
        + '<button type="button" class="btn btn-danger btn-icon-split'
        + ' remove-data-koordinat-perumahan">'
        + '<span class="icon text-white-50">'
        + '<i class="fas fa-minus"></i></span>'
        + '<span class="text">Hapus</span></button>'
        + '</div></div></div>');
});
$(document).on('click', '.remove-data-koordinat-perumahan', function () {
    $(this).parents('#data_sarana_append').remove();
});
