<html lang="es">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
	<script src="../../../Views/public/js/select2.js"></script>
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">
</head>

<body>
	<div class="container">

		<div class="jumbotron">
			<div class="container text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
				<h1><strong>Modificar Colaboradores del Evento</strong></h1>
				<h3>Nombre de la Conferencia | <span class="label label-info"><?php echo $nombreevento; ?></span></h3>

			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<button id="addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Asignar Colaborador</button>
				<div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span id="alert_message"></span>
				</div>
				<table class="table table-bordered table-striped" style="margin-top:20px;">
					<thead>
						<th>Codigo del Evento</th>
						<th>Usuario</th>
						<th>Correo</th>
						<th>Acción</th>
					</thead>
					<tbody id="tbody"></tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="container text-center">

		<H3 class="page-header text-center" align="center">Editar Datos, Conferencistas, Programas, Imagenes y/o Entidades del Evento</H3>

		<a class="btn btn-success" href="modificar.php?idevento=<?php echo $row['idevento']; ?>" role="button">DATOS</a>
		<a class="btn btn-success" href="modificar2.php?idevento=<?php echo $row['idevento']; ?>" role="button">PROGRAMAS</a>
		<a class="btn btn-success" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
		<a class="btn btn-success" href="modificar3.php?idevento=<?php echo $row['idevento']; ?>" role="button">CONFERENCISTAS</a>
		<a class="btn btn-success" href="modificar5.php?idevento=<?php echo $row['idevento']; ?>" role="button">IMAGENES</a>


		<h1></h1>
		<nav>
			<ul class="pagination">
				<li class="page-item"><a href="index.php" class="page-link">&larr; INICIO</a></li>
			</ul>
		</nav>

	</div><?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
	<?php include('../../../Views/public/bootstrap/modal.php'); ?>
	<script src="../../../Views/public/js/appusuarioconf.js"></script>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
		$('#usuario').select2({
			allowClear: true,
			placeholder: 'Escoge una'
		});
	});
</script>