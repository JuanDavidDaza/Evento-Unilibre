<html lang="es">

<head>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/estilos2.css">
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<div class="container text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
				<h1><strong><?php echo $imprimir; ?></strong></h1>
			</div>
			<div class="text-center" style="text-align:center">

				<div class="container text-center">
					<?php if ($imprimir = "REGISTRO EXITOSO") { ?>
						<H3 class="page-header text-center" align="center">A continuación, podrá vincular Programas, Entidades y/o sesiones a su evento,<h4 class="color"><strong><i>Clic en Siguiente para continuar</i></strong> </h4>
						</H3>
						<a class="btn btn-success btn-lg" href="registro1.php?idevento=<?php echo $idevento_1; ?>" role="button">SIGUIENTE</a>
						<h1></h1>
					<?php } else { ?>
						<a class="btn btn-success btn-lg" href="index.php" role="button">INICIO</a>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>
</body>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>

</html>