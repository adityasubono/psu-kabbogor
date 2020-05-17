$(document).ready(function() {
    // var a = 0;
    $("#add_data_inventaris").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var b = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var permukiman_id = $('#permukiman_id').val();
        $("#inventaris-form").append(
            '<div id="data_inventaris_append" class="mt-3 rounded">'
            + '<h5><b>Data Inventaris Ke-' + b + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-6">'
            + '<input type="hidden" class="form-control" id="permukiman_id"'
            + 'name="data_inventaris['+ b +'][permukiman_id]" '
            + 'value="'+ permukiman_id +'">'

            + '<label for="nama_alat">Nama Alat </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama"name="data_inventaris['+ b +'][nama_alat]"'
            + 'placeholder="Masukan Nama Alat" value="">'
            + '</div>'

            + '<div class="col-sm-6">'
            + '<label for="jumlah">Jumlah</label><br>'
            + '<input type="text" name="data_inventaris[' + b + '][jumlah]" '
            + 'placeholder="Masukan Jumlah" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-12">'
            + '<label for="keterangan">Keterangan</label><br>'
            + '<textarea class="form-control" id="keterangan"  '
            + 'name="data_inventaris['+ b +'][keterangan]" rows="3"'
            + 'placeholder="Masukan Keterangan"/>'
            + '</div>'

            + '<div class="col-sm-4 mt-3">'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split mr-2'
            + ' remove-data-inventaris">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(b); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-inventaris', function () {
        $(this).parents('#data_inventaris_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#inventaris-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


