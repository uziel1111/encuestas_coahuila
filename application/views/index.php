
<div class="container">

  <div class="row no-gutters justify-content-md-center mt-4">
    <div class="col-md-5 info-img-1 shadow text-justify">

        <p>
			La educación debe ser una oportunidad para cada persona a lo largo de la vida. En la Secretaría de Educación del Estado de Coahuila (SEDU) y el Instituto Estatal de Educación para Adultos (IEEA), queremos apoyar a quienes no han concluido la educación básica para hacer válido su derecho a la educación y abatir el rezago educativo.
		</p>
        <p>
		La comunidad escolar es una instancia privilegiada para ayudar a los adultos en este objetivo. Por ello, le invitamos a que identifique a padres de familia, personal de apoyo y/o vecinos mayores de 15 años que aún no hayan concluido la primaria o la secundaria. Lo único que hay que hacer es registrar los datos de cada persona en este sencillo formato para que un representante del IEEA se ponga en contacto con ellos. Al registrarla, hará usted posible que mejoren sus condiciones de vida y las de su familia.
		</p>

		<p>
		<strong>Hoy más que nunca, la educación es tarea de todos.</strong>
		</p>

	</div>

    <div class="col-md-5 info-txt-1 shadow">
	<div class="row align-items-start">
    <div class="col">
	  <h5 class="card-title text-center"><i class="fas fa-sign-in-alt color-1"></i> <b>REGISTRO DE PERSONAS</b></h5>
	            <center class="mensaje-terminado"><?=$this->session->flashdata(MESSAGEREQUEST);?></center>
	            <?= form_open('Login/acceso', array('id' =>'formulario_de_login'));?>
	              <div class="form-label-group">
	              	<label for="inputEmail">CCT</label>
	                <input type="text" id="txt_cct_login" name="txt_cct_login" class="form-control" placeholder="CCT">

	              </div>

	              <div class="form-label-group mt-3" id="contenedordeaccesouser">
	              	<label for="inputPassword">TURNO</label>
	                <select class="form-control" id="txt_turno_login" name="txt_turno_login">
				      <option value="-1">SELECCIONE</option>
				      <?php foreach ($turnos as $turno):?>
				      <option value="<?= $turno['id_turno']?>"><?= $turno['turno']?></option>
				      <?php endforeach; ?>
				    </select>
				  </div>
				  <div class="form-label-group mt-3" id="contenedorpassword" style="display: none;">
	              	<label for="inputPasswordcentral">CONTRASEÑA</label>
	                <input type="password" id="inputPasswordcentral" name="inputPasswordcentral" class="form-control">
				  </div>
				  <hr/>
	              <button class="btn btn-lg btn-success btn-block text-uppercase rounded-pill mt-3" type="submit" id="btn_inicia_sesion_encuestas">INICIAR</button>
	            <?= form_close();?>
				<hr/>
		</div>
	</div>

	<div class="row align-items-end" style="vertical-align:;">
    <div class="col">
	<div class="card text-white bg-success shadow">
  <div class="card-body">
  <ul class="list-group">
  <li class="list-group-item list-group-item-action">
	  	<a href="<?=base_url("data/EncuestaRezagoCoahuila.pdf") ?>" style="color:black; text-decoration: none; cursor: pointer;" download="Formato_para_recabar.pdf">
		  <i class="fas fa-pen-square text-muted"></i> Formato para registro fuera de línea.

		</a>
	</li>
</ul>

		</div>
</div>
    </div>
	</div>

	</div>


  </div>



	<!-- <div class="container">

	</div> -->
</div>

<script src="<?= base_url('assets/js/login.js') ?>"></script>
