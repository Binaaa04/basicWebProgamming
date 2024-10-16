$(document).ready(function () {
    // Ketika file dipilih, ubah status tombol upload
    $('#file').change(function () {
        if (this.files.length > 0) {
            $('#upload-button').prop('disabled', false).css('opacity', 1);
        } else {
            $('#upload-button').prop('disabled', true).css('opacity', 0.5);
        }
    });

    // Ketika form di-submit
    $('#upload-form').submit(function (e) {
        e.preventDefault(); // Mencegah pengiriman form secara default
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'upload_ajax.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#status').html(response);
            },
            error: function () {
                $('#status').html('Something wrong when upload file.');
            }
        });
    });
});
