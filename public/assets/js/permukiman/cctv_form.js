$(document).ready(function() {
    // var a = 0;
    $("#add_data_cctv").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var d = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var permukiman_id = $('#permukiman_id').val();
        $("#cctv_form").append(
            '<div id="data_cctv_append" class="mt-3 rounded">'
            + '<h5><b>Data CCTV Ke-' + d + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-4">'
            + '<input type="hidden" class="form-control" id="permukiman_id"'
            + 'name="data_cctv['+ d +'][permukiman_id]" '
            + 'value="'+ permukiman_id +'">'

            + '<label for="nama_cctv">Nama CCTV </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama_cctv"name="data_cctv['+ d +'][nama_cctv]"'
            + 'placeholder="Masukan Nama CCTV" value="">'
            + '</div>'

            + '<div class="col-sm-4">'
            + '<label for="ip_cctv">IP CCTV</label><br>'
            + '<input type="text" id="ip_cctv" name="data_cctv[' + d + '][ip_cctv]" '
            + 'placeholder="Masukan IP CCTV" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-4">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split mr-2'
            + ' remove-data-cctv">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(d); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-cctv', function () {
        $(this).parents('#data_cctv_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#cctv_form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


