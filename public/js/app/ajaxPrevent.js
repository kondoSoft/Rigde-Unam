$(document).on('click', '.ajaxForm', function(event) {
    var ajaxForm = $(this).data('form');
    var form = document.querySelector(ajaxForm);
    var url = $(ajaxForm).attr('action');
    var method = form.method;
    var formData = new FormData(form);
    $('.msg').html('<div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>');
    $.ajax({
        url: url,
        type: method,
        processData: false,
        contentType: false,
        data: formData
    })
    .done(function(data) {
        $('.msg').html('\
                <div class="alert alert-success"> \
                    <ul> \
                        <li> Datos guardados correctamente.</li> \
                    </ul> \
                </div>');
    })
    .fail(function(data) {
        $('.msg').html('\
                <div class="alert alert-danger"> \
                    <ul> \
                        <li> Error al actualizar los datos.</li> \
                    </ul> \
                </div>');
    })
    .always(function() {
        console.log("complete");
    });
});
