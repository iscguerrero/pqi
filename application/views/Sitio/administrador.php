<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="generator" content="Mobirise v4.5.4, mobirise.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/logosolo-2-175x175.jpg') ?>" type="image/x-icon">
	<meta name="description" content="">
	<title>Administrador</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/web/assets/mobirise-icons/mobirise-icons.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/tether/tether.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap-grid.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap-reboot.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/socicon/css/styles.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/animatecss/animate.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/dropdown/css/style.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/theme/css/style.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/mobirise/css/mbr-additional.css') ?>" type="text/css">
</head>
<body>
	<div class="modal fade" id="modalArchivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"><i class="fa fa-gears"></i> Archivo</h4>
				</div>
				<form method="POST" id="formArchivo" enctype = 'multipart/form-data'>
					<input type="hidden" name="id" id="id">
					<div class="modal-body">
						<div class="form-group">
							<label for="archivo">Archivo</label>
							<input type="file" id="archivo" name="archivo">
							<p class="help-block">Solo archivos pdf.</p>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label" for="articulo">Articulo</label>
									<select class="form-control" name="articulo" id="articulo">
										<option value="70">Artículo 70</option>
										<option value="76">Artículo 76</option>
										<option value="64">Artículo 64</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label" for="fraccion">Fracción</label>
									<input type="text" class="form-control" name="fraccion" id="fraccion">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-9">
								<div class="form-group">
									<label class="control-label" for="descripcion">Descripción</label>
									<input type="text" class="form-control" name="descripcion" id="descripcion">
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label class="control-label" for="estatus">Estatus</label>
									<select class="form-control" name="estatus" id="estatus">
										<option value="A">Activo</option>
										<option value="X">Inactivo</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
						<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modalAlerta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<strong id="msjAlerta"></strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-block" data-dismiss="modal" id="btnCerrar"><i class="fa fa-times"></i> Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<section class="menu cid-qFa99CWUqX" once="menu" id="menu2-k">
		<nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<div class="menu-logo">
				<div class="navbar-brand">
					<span class="navbar-logo">
						<a href="http://queretaroindependiente.org">
							<img src="<?php echo base_url('assets/images/logosolo-2-175x175.jpg') ?>" alt="Indepediente" title="Partido Querétaro Independiente" style="height: 3.8rem;">
						</a>
					</span>
					<span class="navbar-caption-wrap"><a class="navbar-caption text-primary display-4" href="#top">Independiente</a></span>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
					<li class="nav-item dropdown open">
						<a class="nav-link link text-primary dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">Nuestro Partido</a>
						<div class="dropdown-menu">
							<a class="text-primary dropdown-item display-4" href="<?php echo base_url('#testimonials1-v') ?>">Directorio</a>
							<a class="text-primary dropdown-item display-4" href="<?php echo base_url('#features4-q') ?>" aria-expanded="false">Pilares Filosóficos</a>
							<a class="text-primary dropdown-item display-4" href="<?php echo base_url('#content5-p') ?>" aria-expanded="false">Legado</a>
							<a class="text-primary dropdown-item display-4" href="<?php echo base_url('#content5-p') ?>" aria-expanded="false">Documentos básicos</a>
							<a class="text-primary dropdown-item display-4" href="<?php echo base_url('#content5-p') ?>" aria-expanded="false">Estrados electrónicos</a>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link link text-primary display-4" href="<?php echo base_url('Transparencia') ?>">Enlaces y Descargas</a></li>
					<li class="nav-item"><a class="nav-link link text-primary display-4" href="<?php echo base_url('Transparencia') ?>">Transparencia</a></li>
					<li class="nav-item"><a class="nav-link link text-primary display-4" href="<?php echo base_url('Login/Salir') ?>">Salir</a></li>
				</ul>
			</div>
		</nav>
	</section>
	<section class="header8 cid-qFaKVkG9tD mbr-parallax-background" id="header4-n">
		<div class="mbr-overlay" style="opacity: 1; background-color: rgb(255, 255, 255);">
		</div>
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="media-content col-md-10">
					<div class="mbr-text align-center mbr-white pb-3"></div>
					<div class="mbr-section-btn align-center"><a class="btn btn-md btn-primary display-4" href="<?php echo base_url() ?>">REGRESAR AL SITIO</a></div>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
			<div id="toolbar">
				<div class="btn-group">
					<button type="button" class="btn btn-success btn-sm" id="btnAlta"><i class="fa fa-plus"></i>Alta</button>
					<button type="button" class="btn btn-success btn-sm" id="btnEditar"><i class="fa fa-edit"></i> Editar</button>
				</div>
			</div>
			<table id="tabla"></table>
	</div>

	<script src="<?php echo base_url('assets/web/assets/jquery/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/popper/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/tether/tether.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/smoothscroll/smooth-scroll.js') ?>"></script>
	<script src="<?php echo base_url('assets/touchswipe/jquery.touch-swipe.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/viewportchecker/jquery.viewportchecker.js') ?>"></script>
	<script src="<?php echo base_url('assets/parallax/jarallax.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/dropdown/js/script.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/theme/js/script.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-table/locale/bootstrap-table-es-MX.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/administrador.js') ?>"></script>
	<input name="animation" type="hidden">
</body>
</html>