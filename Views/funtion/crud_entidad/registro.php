
<!DOCTYPE HTML><html lang="es">
<head><meta charset="UTF-8">
	<title>Adicionar a evento</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<form method="post" action="registro-code.php">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo">
						<h1><strong>Adicionar Entidad</strong></h1>
						<strong><i>Se registrará esta Entidad en la Ciudad "<?php echo $nombreciudad;  ?>"</i></strong>
					</div>
				</div>

				<div class="form-group"><label for="nombreentidad">Nombre de la Entidad</label><input type="text" class="form-control" maxlength="50" minlength="5" required name="nombreentidad" id="nombreentidad"/>
				</div>
				<div class="form-group">
					<label for="url">URL</label><input type="url" class="form-control" maxlength="50" name="url" id="url"/>
					<i>Por favor ingrese una URL y si la entidad no tiene se pondra por defecto esta https://www.unilibrecali.edu.co</i>
				</div>	
				
				<button class="btn btn-primary" id="submit" type="submit">Adicionar Entidad</button>
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
