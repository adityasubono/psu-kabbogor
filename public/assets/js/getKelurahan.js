$(document).ready(function () {
    $('select[name="kecamatan"]').on('change', function () {
        var kecamatan_id = $(this).val();
        if (kecamatan_id) {
            $.ajax({
                url: '/kelurahans/get/' + kecamatan_id,
                type: "GET",
                dataType: "json",
                beforeSend: function () {
                    $('#loader').css("visibility", "visible");
                },

                success: function (data) {

                    $('select[name="kelurahan"]').empty();

                    $.each(data, function (key, value) {

                        $('select[name="kelurahan"]').append(
                            '<option value="' + key + '">' +
                            value + '</option>');

                    });
                },
                complete: function () {
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kelurahan"]').empty();
        }
    });
});
