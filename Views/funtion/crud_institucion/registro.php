
<!DOCTYPE HTML><html lang="es">
<head><meta charset="UTF-8">
	<title>Adicionar a evento</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<form method="post" action="registro-code.php">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo">
						<h1><strong>Adicionar Institución o Entidad</strong></h1>
						<h3><strong>Por defecto se registrará esta Institución o Entidad en la Ciudad seleccionada</strong></h3>
					</div>
				</div>

				<div class="form-group"><label for="nombre">Nombre</label><input type="text" class="form-control" required name="nombre" id="nombre"/>
				</div>
				<div class="form-group"><label for="telefono">Telefono</label><input type="number" class="form-control" required name="telefono" id="telefono"/>
				</div>
				<div class="form-group"><label for="direccion">Dirección</label><input type="text" class="form-control" required name="direccion" id="direccion"/>
				</div>

				<button class="btn btn-primary" id="submit" type="submit">Adicionar Institución</button>
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
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
</html>
