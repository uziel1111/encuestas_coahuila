
<div class="container">

  <div class="row no-gutters justify-content-md-center mt-4">
    <div class="col-md-5 info-img-1 shadow text-justify">
	
        <p>
			La educación debe ser una oportunidad para todos a lo largo de la vida. En la Secretaría
			de Educación Pública y Cultura de Sinaloa(SEPyC), y el Instituto Sinaloense para la Educación de
			los Adultos (ISEA), queremos apoyar a todas las personas que no han concluido la
			educación básica.
		</p>
        <p>
			La escuela es una instancia privilegiada para ayudar a los adultos en este objetivo. Por
			ello, invitamos a toda la comunidad escolar a que pregunte a los alumnos y personal de la
			escuela si tienen algún familiar, amigo o conocido <strong>mayor de 15 años</strong> y que no haya
			concluido la primaria o la secundaria. No importa en qué parte del estado viva esa
			persona.
		</p>
		<p>
			Lo único que hay que hacer es registrar a estas personas en esta aplicación, para que un
			representante del ISEA <strong>o de la SEPyC </strong> se ponga en contacto con ellos. Al registrarla, le habrás ayudado a
			esa persona a alcanzar una meta que seguramente tendrá un impacto muy positivo en su
			vida y en la de su familia. 
		</p>
		<p>
		<strong>¡Todos son bienvenidos!</strong>
		</p>

	</div>
	
    <div class="col-md-5 info-txt-1 shadow">
	<div class="row align-items-start">
    <div class="col">
	  <h5 class="card-title text-center"><i class="fas fa-sign-in-alt color-1"></i> INGRESAR</h5>
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
	              <button class="btn btn-lg btn-success btn-block text-uppercase rounded-pill mt-3" type="submit" id="btn_inicia_sesion_encuestas">INICIAR SESIÓN</button>
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
	  	<a href="<?=base_url("data/EncuestaRezagoSinaloa.pdf") ?>" style="color:black; text-decoration: none; cursor: pointer;" download="EncuestaRezagoSinaloa.pdf">
		  <i class="fas fa-pen-square text-muted"></i> Formato de levantamiento 

		</a>
	</li>
  <li class="list-group-item list-group-item-action">
	  <a href="<?=base_url("data/Politicasprivacidad.pdf") ?>"  style="color:black; text-decoration: none; cursor: pointer;" target="_blank">
	  <i class="fas fa-award text-muted"></i> Política de Privacidad</a> 
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
