$(document).ready(function() {
    $(document).on('click', '.modalURL', function(event) {
        event.preventDefault();
        modal = $(this).data('modal');
        url = $(this).attr('href');
        console.log(modal + ' ' + url);
        $(modal).modal().find('.msg').html('<div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>');
        $(modal).modal().find('.modal-body').load(url);
    });
});
