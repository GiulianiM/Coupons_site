document.addEventListener('DOMContentLoaded', function() {
    var immagineInput = document.getElementById('immagine');
    immagineInput.addEventListener('change', function() {
        var fileInput = this;
        var files = fileInput.files;

        if (files.length > 0) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var fileType = file.type;

                if (fileType !== 'image/jpeg' && fileType !== 'image/png' && fileType !== 'image/gif' && fileType !== 'image/svg+xml') {
                    fileInput.value = '';
                    alert('Seleziona solo immagini JPEG, PNG, GIF o SVG.');
                    return;
                }
            }
        }
    });
});
