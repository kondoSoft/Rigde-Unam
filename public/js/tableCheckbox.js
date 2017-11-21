$(document).on('click', '.tableCheckbox tr', function(event) {
     if (event.target.type !== 'checkbox') {
          $(':checkbox', this).trigger('click');
     }
});
