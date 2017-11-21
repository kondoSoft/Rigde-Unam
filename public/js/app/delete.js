$(document).on('click', '.deleteJS', function(event) {
    var form = $(this).closest('form');
    var modalId = $(this).data('modaltargetid');
    var msg = $(this).data('modaldisplaytext');
    console.log(modalId + ' ' + msg);
    $("#" + modalId).find('.modal-body').html('<p>' + msg +'</p>');
    $("#" + modalId).modal().on('click', '#delete', function(event) {
        form.trigger('submit');
    });
});
