<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="UTF-8">

	<title>Universidad Libre</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!--font awesome con CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<script src="../../../Views/public/js/registro_conferencista.js"></script>
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo">
						<h1><strong>Adicionar Imagen</strong></h1>
					</div>
				</div>
				<?php if (isset($errMSG)) { ?>
					<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong> </div>
				<?php	} else if (isset($successMSG)) { ?>
					<div class="alert alert-success"> <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong> </div>
				<?php	} ?>
				<form method="post" enctype="multipart/form-data">



					<input type="hidden" id="accion" name="accion" value="btnAgregar" />
					<input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento; ?>" />

					<div class="form-group"><label for="nombre">Nombre</label><input type="text" maxlength="100" minlength="8" class="form-control" required name="nombre" id="nombre" />
					</div>

					<div class="form-group"><label for="detalles">Detalles</label><input type="text" maxlength="150" minlength="8" class="form-control" required name="detalles" id="detalles" />
					</div>


					<div class=" form-group"><label for="tipo">Tipo</label>
						<select name="tipo" class="form-control">
							<!-- Opciones de la lista -->
							<option value="Principal">Principal</option>
							<option value="Otro" selected>Otro</option> <!-- Opción por defecto -->
						</select>
					</div>

					<div class="form-group"><label for="imagen">Foto</label>
						<input type="file" class="form-control" accept="image/*" name="imagen" required placeholder="" id="imagen">
					</div>

					<button type="submit" name="btnsave" class="btn btn-primary btn-lg btn-block"> <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar Imagen </button>
				</form>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item"><a href="<?php echo $enlace; ?>" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</body>

</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>