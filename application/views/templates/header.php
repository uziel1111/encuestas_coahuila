<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> ENCUESTAS </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  
   <script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
  <script src="<?=base_url('assets/jquery/jquery.validate.js')?>"></script>
  

  <link href="<?= base_url('assets/fonts/fontawesome5/css/all.css') ?>" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="<?= base_url('assets/img/logosin.png') ?>" />
	<script type="text/javascript">
  var base_url = live_url = "<?= base_url() ?>";
</script>

</head>

<body>

<div class="container-fluid color-bar fixed-top clearfix">
        <div class="row" >
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>
          <div class="col-lg-1 col-2 bg-color-3"></div>

		  <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
          <div class="col-1 bg-color-3 d-none d-lg-block"></div>
		
        </div>
      </div>
      <div class="header bg-dark d-none d-lg-block">
	<div class="container">
		<div class="row">
    <?php if(isset($cct)) :?>
			<div class="col-6 header-info">
      <i class="fas fa-genderless color-animation"></i> <span class="text-white"><strong> <?= $cct['cct'] ?></strong> <i class="fas fa-genderless color-animation"></i> <?= $cct['nombre_ct'] ?></span> <i class="fas fa-genderless color-animation"></i> <?= $cct['turno'] ?></span>
			</div>
			<div class="col-6 text-right">
        <a class="btn btn-secondary rounded-pill btn-sm" href="<?= site_url("Login/cerrar_sesion")?>"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
      </div>
      <?php else : ?>
			<div class="col-6">
     BIENVENIDO
			</div>      
      <?php endif; ?>
		</div>        <!--/row-->
	</div>    <!--container-->
</div>



  <!-- Fixed navbar -->

  <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
  <div class="container d-flex justify-content-between">
  
    <a class="navbar-brand"><img src="<?php echo base_url('assets/img/censo-logo.png') ?>" class="img-fluid" alt="Escudo Sinaloa"></a>
    <div class="justify-content-end">
   
    </div>
    <?php if(isset($cct)) :?>
    <div class="btn-group d-lg-none">
				  <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-school"></i>
				  </button>
				  <div class="dropdown-menu dropdown-menu-right">
				  <div class="arrow-up"></div>
					<p>
						<strong><?= $cct['nombre_ct'] ?></strong><br>
						<?= $cct['cct'] ?>
						<div class="dropdown-divider"></div>
						<span class="align-middle"><?= $cct['turno'] ?></span>
						<i class="fas fa-adjust align-middle" aria-hidden="true"></i>
						<div class="dropdown-divider"></div>			  
            <a class="btn btn-dark rounded-pill btn-block" href="<?= site_url("Login/cerrar_sesion")?>"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>				  
					</p>

				  </div>
				</div>
    <?php endif; ?>
    </div>

  </nav>

