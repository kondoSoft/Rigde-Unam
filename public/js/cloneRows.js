$(document).on('click','#agregar',function(){
     var tr = $(this).closest('tbody').find('tr:last');
     var clone = tr.clone();
     var num = clone.find('input:last').attr('name').match(/[\d]+/)[0];
     num = Number(num)+1;
     clone.find('input').attr({'name': function(_,name){return name.replace(/[\d]+/,num)}});
     clone.find('select').attr({'name': function(_,name){return name.replace(/[\d]+/,num)}});
     clone.find('input').val('');

     tr.after(clone);
     $(this).closest('.cloneRow').contar();
});
$("#horarios, .cloneRow").on('click','#eliminar',function(){
     if($(this).closest('tbody').children('tr').length > 1){
          $(this).closest('tr').remove();
     }
});

$.fn.contar = function() {
    var totalRows = $('.cloneRow > tbody > tr').length;
    console.log(totalRows);
}
