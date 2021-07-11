

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
						<?php if($resultado) { ?>
						<h1><strong>REGISTRO ELIMINADO</strong></h1>
						<?php } else { ?>
						<h1><strong>ERROR AL ELIMINAR</strong></h1>
					<?php } ?>
					</div>
					<div class="row" style="text-align:center">					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
				</div>
			</div>
		</div>
	</body>
	<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
</html>