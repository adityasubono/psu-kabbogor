$(document).ready(function() {
    // var a = 0;
    $("#add_data_petugas").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var a = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var pertamanan_id = $('#pertamanan_id').val();
        $("#petugas-form").append(
            '<div id="data_petugas_append" class="mt-3 rounded">'
            + '<h5><b>Data Petugas Ke-' + a + '</b></h5>'
            + '<hr class="bg-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-6">'
            + '<input type="hidden" class="form-control" id="pertamanan_id"'
            + 'name="data_petugas['+ a +'][pertamanan_id]" value="'+ pertamanan_id +'">'

            + '<label for="nama">Nama </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama"name="data_petugas['+ a +'][nama]"'
            + 'placeholder="Masukan Nama Petugas" value="">'
            // + '@error(data_petugas['+ a +']nama)'
            // + '<div class="invalid-feedback">{{ old( data_petugas['+ a +'][nama]) }}</div>'
            // + '@enderror'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="umur">Umur</label><br>'
            + '<input type="text" name="data_petugas[' + a + '][umur]" '
            + 'placeholder="Masukan Umur" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="longitude">Pendidikan Terakhir</label><br>'
            + '<select class="custom-select" id="pendidikan"'
            + 'name="data_petugas['+ a +'][pendidikan]" value="">'
            + '<option value="">--Pilih Pendidikan--</option>'
            + '<option value="SD">SD</option>'
            + '<option value="SMP">SMP</option>'
            + '<option value="SMA">SMA</option>'
            + '<option value="D3">D3</option>'
            + '<option value="S1">S1</option>'
            + '</select>'
            + '</div>'

            + '<div class="col-sm-6 mt-2">'
            + '<label for="tugas">Tugas</label><br>'
            + '<textarea class="form-control" id="tugas"  '
            + 'name="data_petugas['+ a +'][tugas]" rows="3"'
            + 'placeholder="Masukan Deskripsi Tugas"/>'
            + '</div>'

            + '<div class="col-sm-6 mt-2">'
            + '<label for="keterangan_tugas">Keterangan</label><br>'
            + '<textarea class="form-control" id="keterangan_tugas"  '
            + 'name="data_petugas['+ a +'][keterangan_tugas]" rows="3"'
            + 'placeholder="Masukan Deskripsi Keterangan"/>'
            + '</div>'

            + '<div class="col-sm-4">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" class="btn btn-danger btn-icon-split mr-2'
            + ' remove-data-petugas">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(a); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '.remove-data-petugas', function () {
        $(this).parents('#data_petugas_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#petugas-form").html(""); // Kita kosongkan isi dari div insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


