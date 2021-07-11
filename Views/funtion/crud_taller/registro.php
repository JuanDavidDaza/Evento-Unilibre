<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Adicionar a evento</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/estilos2.css">
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">
	<script src="../../../Views/public/js/validar2.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
	<script src="../../../Views/public/js/select2.js"></script>
	<style type="text/css">
		.error {
			color: red;
			font-size: 90%;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<form method="POST" name="contactForm" onsubmit="return validateForm()" action="registroe.php">

					<div class="jumbotron">
						<div class="container text-center">
							<img src="../../../Content/logopequeño.png" width="150" class="logo">
							<h1><strong>Tipo de evento: Taller</strong></h1>
							<h4><i><strong>Esta taller será registrado en la ciudad que actualmente tiene seleccionada.</strong></i></h4>
						</div>
					</div>

					<div class="form-group"><label for="nombreevento">Nombre del Evento</label><input type="text" maxlength="100" minlength="5" class="form-control" name="nombreevento" id="nombreevento" />
						<div class="error" id="nombreeventoErr"></div>
					</div>

					<div class="form-group"><label for="certificado">¿Realiza Certificado? Si o No</label>
						<select name="certificado" class="form-control">
							<!-- Opciones de la lista -->
							<option value="No">No</option>
							<option value="Si" selected>Si</option> <!-- Opción por defecto -->
						</select>
					</div>

					<div class="form-group"><label for="generalinfo">Descripción del Evento</label><input type="text" maxlength="800" minlength="5" class="form-control" name="generalinfo" id="generalinfo" />
						<div class="error" id="generalinfoErr"></div>
					</div>

					<div class="form-group"><label for="tematica">Tema del Evento</label><input type="text" maxlength="100" minlength="5" class="form-control" name="tematica" id="tematica" />
						<div class="error" id="tematicaErr"></div>
					</div>

					<div class="form-group"><label for="responsable">Responsable</label><input type="text" maxlength="100" minlength="5" class="form-control" name="responsable" id="responsable" />
						<div class="error" id="responsableErr"></div>
					</div>

					<button class="btn btn-primary btn-lg btn-block" id="submit" type="submit">Adicionar Registro</button>
					<i>Debes primero Registrar el Evento para así poder agregar Progamas, Entidades y/o Sesiones</i>


				</form>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item"><a href="index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</body>

</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#idciudad').select2({
			placeholder: 'Escoge una'
		});
	});
</script>