var Loading = {
  loading : function(texto) {
   Swal.fire({
        // title: "<div class='loader'></div>",
        title:"<i class='fa fa-spinner fa-spin' style='font-size:100px; color:#7ea629'></i>",
        text: texto,
        width: 250,
        padding: 60,
        showCancelButton: false,
        showConfirmButton: false,
        allowEscapeKey:false,
        allowOutsideClick:false,
        customClass : 'trans'
      });
	}

};