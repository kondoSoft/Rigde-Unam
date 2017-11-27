$(document).ready(function() {
    $('.radioHideText').on('change', 'input[type="radio"][name="estado"]', function(event) {
        event.preventDefault();
        $('.radioHideText').find('.selected').removeClass('selected').hide('slow/400/fast', function() {
            $(this).find('input[name="descripcion"]').remove();
            $(this).find('label[for="descripcion"]').remove();
        });
        if($(this).val() == 'vigente' || $(this).val() == 'susTotAct') {
            return true;
        } else {
            var input = '<input name="descripcion" type="text" class="form-control col-md-2">';
            var label = '<label for="descripcion"> Especificar en cual semestre / año se encuentra la incorporación </label>';
            $(this).closest('.form-group').find('.form-group').addClass('selected').append([label,input]).show('slow');
        }
    });
});
