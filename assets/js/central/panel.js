$(document).ready(function () {
		obj_cfcentral = new Centraluser();
});

$("#btn_cortecentral_exportarexcel").click(function(e){
		e.preventDefault();
		obj_cfcentral.get_reporte_excel();
});

function Centraluser(){
   _thisccentral = this;
}

Centraluser.prototype.get_reporte_excel = function (){
	var form = document.createElement("form");
	  form.name = "form_corte_central_reporteexcel";
	  form.id = "form_corte_central_reporteexcel";
	  form.method = "POST";
	  form.target = "_blank";
	  form.action =base_url+"Reportes/get_reporte_excel";
	  document.body.appendChild(form);
	  form.submit();
};