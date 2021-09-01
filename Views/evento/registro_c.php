<html lang="es">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!--font awesome con CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="shortcut icon" href="./Content/favicon.ico" type="image/x-icon">
</head>

<body>
	<div class="container">
		<div class="jumbotron card">
			<div class=" text-center">
				<img src="./Content/logopequeño.png" width="150" class="logo">
				<?php if (empty($idasistente_err)) { ?>
					<h3>SE REGISTRÓ CORRECTAMENTE A ESTE EVENTO</h3>
				<?php } else { ?>
					<h3>NO PUEDES REGISTRARTE A ESTE EVENTO </h3>
				<?php } ?>
			</div>
			<div class="text-center" style="text-align:center">
				<a href="./index.php" class="btn btn-primary">Regresar</a>

			</div>
		</div>
	</div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>