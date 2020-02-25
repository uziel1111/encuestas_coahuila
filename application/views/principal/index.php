
<div class="container">
	<div class="row">
      <div class="col-2 mb-2 float-left">
          <!-- <div class="form-check" id="check_sin_registros_reg_completo">
            <input type="checkbox" class="form-check-input" id="check_sin_registros_reg" <?=($sinregistros == 1 )? 'checked': ''?> >
            <label class="form-check-label" for="check_sin_registros_reg">Sin datos que registrar</label>
          </div> -->
      </div>
      <div class="col-6 mb-6">
      </div>
	    <div class="col-4 mb-4 ">
	      <button class="float-right btn btn-md btn-success rounded-pill" id="btn_agregar_encuesta"><i class="fas fa-plus-circle"></i> Registrar Adulto</button>
	      <!-- <button class="btn btn-md btn-secondary" id="btn_editar_encuesta">Editar</button>
	      <button class="btn btn-md btn-danger"  id="btn_eliminar_encuesta">Eliminar</button> -->
	    </div>
	</div>
	<div class="row">
    <input type="hidden" id="haydatos">
		<div class="col" id="container_table_encuestas">
			<table class='table table-striped table-hover table-scrolled scroll-dark shadow' id='id_tabla_encuestas'>
              <thead class='thead-dark'>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>NOMBRE</th>
                  <th scope='col'>EDAD</th>
                  <th scope='col'>DOMICILIO</th>
                  <th scope='col'>MUNICIPIO</th>
                  <th scope='col'>REZAGO</th>
                  <th scope='col'>EDITAR</th>
                  <th scope='col'>ELIMINAR</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
		</div>
	</div>
</div>



<div id='modal_get_encuesta' class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static"
   data-keyboard="false" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ENCUESTA</h5>
        <button type="button" class="close" id="btn_cerrar_event" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contenedor_encuesta">

      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <button class="btn btn-sm btn-primary float-right" id="btn_grabar_encuesta" type="submit" >AGREGAR</button>
          </div>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/inicio/inicio.js') ?>"></script>