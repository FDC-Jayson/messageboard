$(document).ready(function() {
    $('#upload-image').on('change', function(e) {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            $('#imagePreview').attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });
    $( "#datepicker" ).datepicker();
    $('#upload-image-btn').click(function() {
        $('#upload-image').click();
    });
});