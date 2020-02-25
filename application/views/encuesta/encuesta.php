

<div class="container-fluid">	
	<div class="row">
		<div class="col">
			<form id="formulario_de_prueba" name="formulario_de_prueba" method="post"  action="">
				<input type="hidden" class="form-control" value="" name="input_editando_encuesta" id="input_editando_encuesta">
			<?php foreach ($preguntas as $key => $pregunta):?>
				
				<?php if ($pregunta['id_pregunta'] == 24): ?>

					<div class="form-group">
				    <label for="exampleFormControlSelect1"><?= ($pregunta['obligatoria'] == 1)? '<span class=text-danger>*</span>': ''?> <?= $pregunta['pregunta']?></label>
				    <input type="hidden" class="form-control" value="<?= $pregunta['id_pregunta']?>" name= "<?= $pregunta['etiqueta']?>_oculto">
				    <select class="form-control textMayus" id="slt_encuesta_municipio" name="municipio">
				      <option value="-1">SELECCIONE</option>
				      <?php foreach ($municipios as $key => $municipio):?>
				      <option value="<?= $municipio['id_municipio'] ?>"> <?= $municipio['municipio'] ?> </option>
				      <?php endforeach; ?>
				    </select>
				  </div>

				<?php elseif ($pregunta['id_pregunta'] == 27): ?>

					<label for="exampleFormControlSelect1"><?= ($pregunta['obligatoria'] == 1)? '<span class=text-danger>*</span>': ''?> <?= $pregunta['pregunta']?></label>
					<?php $opciones = explode("&", $pregunta['descr']); ?>
					<?php $cont = 1; foreach ($opciones as $key => $opcion):?>

					<div class="form-check">
					  <input class="form-check-input textMayus" type="radio" name="rezago" id="exampleRadios<?= $cont?>" value="<?= $opcion ?>" checked>
					  <input type="hidden" class="form-control" value="<?= $pregunta['id_pregunta']?>" name= "<?= $pregunta['etiqueta']?>_oculto">
					  <label class="form-check-label" for="exampleRadios<?= $cont?>">
					    <?= $opcion ?>
					  </label>
					</div>

					<?php $cont = $cont+1; endforeach; ?>
				<?php else: ?>

				<div class="form-group">
				    <label for="<?= $pregunta['etiqueta']?>"> <?= ($pregunta['obligatoria'] == 1)? '<span class=text-danger>*</span>': ''?> <?= $pregunta['pregunta']?></label>
				    <input type="text" class="form-control textMayus" id="<?= $pregunta['etiqueta']?>" name= "<?= $pregunta['etiqueta']?>">
				    <input type="hidden" class="form-control" value="<?= $pregunta['id_pregunta']?>" name= "<?= $pregunta['etiqueta']?>_oculto">
				</div>

				<?php endif; ?>

			<?php endforeach; ?>
		</form>
		<p>
			<span class=text-danger>* Datos obligatorios</span>
		</p>
		
		</div>
	</div>	
</div>

<script src="<?= base_url('assets/js/encuesta/encuesta.js') ?>"></script>