//JS para realizar submit al form definido en el data-form
$(document).on('click', '.submitForm', function(event) {
    event.preventDefault();
    var form = $(this).data('form');
    console.log(form);
    $(form).trigger('submit');
});
