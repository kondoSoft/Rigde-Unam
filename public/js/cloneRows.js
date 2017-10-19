$(document).on('click','#agregar',function(){
     var tr = $('tbody').find('tr:last');
     var clone = tr.clone();
     var num = clone.find('input:last').attr('name').match(/[\d]+/)[0];
     num = Number(num)+1;
     clone.find('input').attr({'name': function(_,name){return name.replace(/[\d]+/,num)}});
     clone.find('select').attr({'name': function(_,name){return name.replace(/[\d]+/,num)}});
     clone.find('input').val('');

     tr.after(clone);
});
$("#horarios").on('click','#eliminar',function(){
     if($('tbody>tr').length > 1){
          $(this).closest('tr').remove();
     }
});
