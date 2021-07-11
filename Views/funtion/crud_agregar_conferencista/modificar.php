<html lang="es">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<!--font awesome con CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

	<style type="text/css">
		.error {
			color: red;
			font-size: 90%;
		}

		p {
			font: 130% sans-serif;
		}
	</style>
	<script src="../../../Views/public/js/modificacion_conferencista.js"></script>

</head>

<body>
	<div class="container">

		<div class="jumbotron">
			<div class="container text-center">
				<img src="../../../Content/logopequeño.png" width="150">
				<h1><strong>Modificar el Registro</strong></h1>
				<p>Nombre del Conferencista <span class="badge badge-primary"><?php echo $row1['nombre']; ?></span></p>
				<p><span class="label label-primary"></span></p>
			</div>
		</div>

		<form name="contactForm" method="post" onsubmit="return validateForm()" action="update.php" enctype="multipart/form-data">

			<div class="form-group">
				<label class="error"><strong>* Obligatorio</strong></label>

				<div class="form-group"><label for="cedula">Cedula</label><label class="error">*</label><input value="<?php echo $row1['cedula']; ?>" type="number" class="form-control" name="cedula" id="cedula" />
					<div class="error" id="cedulaErr"></div>
				</div>

				<div class="form-group"><label for="nombre">Nombre y Apellido Completo</label><label class="error">*</label><input value="<?php echo $row1['nombre']; ?>" type="text" class="form-control" name="nombre" id="nombre" />
					<div class="error" id="nombreErr"></div>
				</div>
				<input type="hidden" class="form-control" id="nombre1" name="nombre1" value="<?php echo $row1['nombre']; ?>" required>

				<div class="form-group"><label for="celular1">Numero de Contacto 1</label><label class="error">*</label><input value="<?php echo $row1['celular1']; ?>" type="text" class="form-control" name="celular1" id="celular1" />
					<div class="error" id="celular1Err"></div>
				</div>

				<div class="form-group"><label for="celular2">Numero de Contacto 2</label><input value="<?php echo $row1['celular2']; ?>" type="text" class="form-control" name="celular2" id="celular2" />
					<div class="error" id="celular2Err"></div>
				</div>

				<div class="form-group"><label for="correo">Correo</label><label class="error">*</label><input value="<?php echo $row1['correo']; ?>" type="email" class="form-control" name="correo" id="correo" />
					<div class="error" id="correoErr"></div>
				</div>

				<div class="form-group"><label for="perfil">Perfil</label><label class="error">*</label><textarea class="form-control" value="" name="perfil" row1s="5" size="15"><?php echo $row1['perfil']; ?></textarea>
					<div class="error" id="perfilErr"></div>
				</div>
			</div>

			<div class="form-group"><label for="linkedin">Linkedin</label><input value="<?php echo $row1['linkedin']; ?>" type="email" class="form-control" name="linkedin" id="linkedin" />
				<div class="error" id="linkedinErr"></div>
			</div>

			<div class="form-group"><label for="pais">País</label><label class="error">*</label><input value="<?php echo $row1['pais']; ?>" type="text" class="form-control" name="pais" id="pais" />
				<div class="error" id="paisErr"></div>

			</div>

			<input type="hidden" id="cedula1" name="cedula1" value="<?php echo $row1['cedula']; ?>" />
			<input type="hidden" id="nombre1" name="nombre1" value="<?php echo $row1['nombre']; ?>" />

			<div class="form-group col-md-12">
				<label for="">Foto </label>
				<br>
				<img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../../../Content/imagenes_conferencistas/<?php echo $row1['foto']; ?>" />
				<br />
				<br />
				<input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto">
				<br>
			</div>



			<div class="form-group">

				<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>

			</div>
		</form>

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>