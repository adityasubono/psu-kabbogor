$(document).ready(function() {
    // var a = 0;
    $("#add_data_koordinat").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var c = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var permukiman_id = $('#permukiman_id').val();
        $("#koordinat_form").append(
            '<div id="data_koordinat_append" class="mt-3 rounded">'
            + '<h5><b>Data Koordinat Ke-' + c + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-6">'
            + '<input type="hidden" class="form-control" id="permukiman_id"'
            + 'name="data_koordinat['+ c +'][pertamanan_id]" '
            + 'value="'+ permukiman_id +'">'

            + '<label for="longitude">Koordinat Latitude </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama"name="data_koordinat['+ c +'][latitude]"'
            + 'placeholder="Masukan Koordinat Latitude" value="">'
            + '</div>'

            + '<div class="col-sm-6">'
            + '<label for="latitude">Koordinat Longitude</label><br>'
            + '<input type="text" name="data_koordinat[' + c + '][longitude]" '
            + 'placeholder="Masukan Koordinat Longitude" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-4 mt-3">'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split mr-2'
            + ' remove-data-koordinat">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(c); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-koordinat', function () {
        $(this).parents('#data_koordinat_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#koordinat_form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


