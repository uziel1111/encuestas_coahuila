$(function() {
    obj_login = new Login();
    
});
$.validator.addMethod("select_not_menos1", function(value, element){
  return(value=="-1" || value==-1)?false:true;
});


$("#formulario_de_login" ).validate({
  onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
       rules: {
               txt_cct_login: {
                       required: true,
               },
               txt_turno_login: {
                    select_not_menos1: true, 
               }
       },
       messages: {
               txt_cct_login: {
                       required: "<span class='text-danger'>Introduzca CCT</span>",
               },
               txt_turno_login: {
                       select_not_menos1: "<span class='text-danger'>Seleccione un turno</span>",
               }
       },
       submitHandler: function(form) {
          form.submit();
       }
});

function Login(){
  _this = this;
}

$("#btn_inicia_sesion_encuestas").click(function(e){
  e.preventDefault();
  $("#formulario_de_login").submit();
});

$("#txt_cct_login").change(function(){
  if($("#txt_cct_login").val() == "ADMIN@CENTRAL" || $("#txt_cct_login").val() == "admin@central"){
    $("#contenedordeaccesouser").hide("slow", function() {
      $("#contenedorpassword").show("slow");
    });
  }else{
    $("#contenedorpassword").hide("slow", function() {
      $("#contenedordeaccesouser").show("slow");
    });
  }
});