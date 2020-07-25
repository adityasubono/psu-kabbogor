$(document).ready(function() {
    // var a = 0;
    $("#add_data_bast").click(function () {
        var jumlah = parseInt($("#jumlah-form-bast").val()); // Ambil jumlah data form pada textbox jumlah-form
        var b = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var perumahan_id = $('#perumahan_id').val();
        $("#bast-form").append(
            '<div id="data_bast_append" class="mt-3 rounded">'
            + '<h5><b>Data Ke-' + b + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="perumahan_id"'
            + 'name="data_bast['+ b +'][perumahan_id]" '
            + 'value="'+ perumahan_id +'">'

            + '<label for="tanggal">Tanggal Serah Terima</label><br>'
            + '<input type="date" class="form-control"'
            + 'id="tanggal" name="data_bast['+ b +'][tanggal]"'
            + 'placeholder="Masukan Nama Alat" value="">'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="no_bast">No. Berita Acara'
            + ' Serah Terima</label><br>'
            + '<input type="text" name="data_bast[' + b + '][no_bast]" '
            + 'placeholder="Masukan No. Berita Acara Serah Terima" '
            + 'class="form-control" />'
            + '</div>'


            + '<div class="col-sm-3">'
            + '<label for="no_sph">No. Surat Pengakuan Hak</label><br>'
            + '<input type="text" name="data_bast[' + b + '][no_sph]" '
            + 'placeholder="Masukan No. Surat Pengakuan Hak" '
            + 'class="form-control" />'
            + '</div>'


            + '<div class="col-sm-3">'
            + '<label for="aksi" class="text-center">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split float-right'
            + ' remove-data-bast">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form-bast").val(b); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-bast', function () {
        $(this).parents('#data_bast_append').remove();
    });

    $("#btn_form_reset_bast").click(function(){
        $("#bast-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form-bast").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


