$(function() {
    obj_tabla = new Tabla(); 
});



function Tabla(){
  _this = this;
}


Tabla.prototype.seleccion = function(id_tabla){
  $("#"+id_tabla+" tr").click(function(){
      $(this).addClass('selected').siblings().removeClass('selected');
      obj_tabla.id_select = $(this).find('th:first').text(); 
      console.log(obj_tabla.id_select);
  });
}