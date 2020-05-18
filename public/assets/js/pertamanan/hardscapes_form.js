$(document).ready(function() {
    // var a = 0;
    $("#add_data_hardscape").click(function () {
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var a = jumlah + 1; // Tambah 1 untuk jumlah form nya

        var pertamanan_id = $('#pertamanan_id').val();
        $("#hardscapes-form").append(
            '<div id="data_hardscape_append" class="mt-3 rounded">'
            + '<h5><b>Data Hardscape Ke-' + a + '</b></h5>'
            + '<hr class="bg-primary">'
            + '<div class="row my-3">'
            + '<div class="col-sm-3">'
            + '<input type="hidden" class="form-control" id="pertamanan_id"'
            + 'name="data_hardscape['+ a +'][pertamanan_id]" value="'+ pertamanan_id +'">'

            + '<label for="nama_alat">Nama Alat</label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama_alat"name="data_hardscape['+ a +'][nama_alat]"'
            + 'placeholder="Masukan Nama Petugas" value="">'
            // + '@error(data_petugas['+ a +']nama)'
            // + '<div class="invalid-feedback">{{ old( data_petugas['+ a +'][nama]) }}</div>'
            // + '@enderror'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="tipe">Merk / Tipe</label><br>'
            + '<input type="text" name="data_hardscape[' + a + '][tipe]" '
            + 'placeholder="Masukan Merk / Tipe" '
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="tahun_perolehan">Tahun Diperoleh</label><br>'
            + '<select class="custom-select" id="tahun_perolehan"'
            + 'name="data_hardscape['+ a +'][tahun_perolehan]" value="">'
            + '<option value="">--Pilih Tahun Diperoleh--</option>'
            + '<option value="2020">2020</option>'
            + '<option value="2019">2019</option>'
            + '<option value="2018">2018</option>'
            + '<option value="2017">2017</option>'
            + '<option value="2016">2017</option>'
            + '<option value="2015">2015</option>'
            + '<option value="2014">2014</option>'
            + '<option value="2013">2013</option>'
            + '<option value="2012">2012</option>'
            + '<option value="2011">2011</option>'
            + '<option value="2010">2010</option>'
            + '</select>'
            + '</div>'

            + '<div class="col-sm-3">'
            + '<label for="kondisi">Kondisi</label><br>'
            + '<select class="custom-select"'
            + 'id="kondisi" name="data_hardscape['+ a +'][kondisi]">'
            + ' <option value="">--Pilih Kondisi--</option>'
            + '<option value="Baik">Baik</option>'
            + '<option value="Rusak Ringan">Rusak Ringan</option>'
            + '<option value="Rusak Berat">Rusak Berat</option>'
            + '</select></div>'


            + '<div class="col-sm-12 mt-2">'
            + '<label for="keterangan">Keterangan</label><br>'
            + '<textarea class="form-control" id="keterangan"  '
            + 'name="data_hardscape['+ a +'][keterangan]" rows="3"'
            + 'placeholder="Masukan Deskripsi Keterangan"/>'
            + '</div>'

            + '<div class="col-sm-4 mt-3">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" class="btn btn-danger btn-icon-split mr-2"'
            + 'id="remove-data-hardscape">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>');

        $("#jumlah-form").val(a); // Ubah value textbox jumlah-form dengan
        // variabel nextfor
    });
    $(document).on('click', '#remove-data-hardscape', function () {
        $(this).parents('#data_hardscape_append').remove();
    });

    $("#btn-reset-form").click(function(){
        $("#hardscapes-form").html(""); // Kita kosongkan isi dari div
        // insert-form
        $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
    });
});


