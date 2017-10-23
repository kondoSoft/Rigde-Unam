$('.tableCheckbox').on('click', 'tr', function(event) {
     if (event.target.type !== 'checkbox') {
          $(':checkbox', this).trigger('click');
     }
});
