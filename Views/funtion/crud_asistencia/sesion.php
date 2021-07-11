<html lang="es">

<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

	<!--<link rel="stylesheet" href="../../../Views/public/css/main.css"> -->
	<!--datables CSS básico-->
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css" />
	<!--datables estilo bootstrap 4 CSS-->
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

	<!--font awesome con CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class="jumbotron">
			<div class="text-right">
				<a href="imprimir2.php?idevento=<?php echo $row1['idevento']; ?>" class="btn btn-warning">Exportar Datos</a>
			</div>
			<div class="container text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
				<h2><STRONG>UNIVERSIDAD LIBRE <br> Gestión de Asistencia al Evento</STRONG></h2><br>
				<h2><strong>Evento:</strong> <?php echo $row1['nombreevento']; ?></h2>
				<h2>Por favor selecciona una sesión del evento para realizar el control de la asistencia</h2> <br><br>
				<a href="registro_asistente.php?idevento=<?php echo $idevento ?>" class="btn btn-info">Registrar Nuevo Asistente al Evento</a><br>

			</div>
		</div>

		<div class="row table-responsive">
			<table id="example" class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Lugar</th>
						<th>HoraInicio</th>
						<th>HoraFin</th>
						<th>fechainicio</th>
						<th>fechafin</th>
						<th>Acción</th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['nombresesion']; ?></td>
							<td><?php echo $row['audsalon']; ?></td>
							<td><?php echo date("g:i a", strtotime($row['horainicio'])); ?></td>
							<td><?php echo date("g:i a", strtotime($row['horafin'])); ?></td>
							<td><?php echo $row['fechainicio']; ?></td>
							<td><?php echo $row['fechafin']; ?></td>
							<td><a href="inscritos.php?id=<?php echo $row['id']; ?>&idevento=<?php echo $row['idevento']; ?>"><span class="glyphicon glyphicon-search"></span></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item "><a href="index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="text-center">
			<p>Universidad Libre Seccional Cali</p>
		</div>
		<p></p>
		<p></p>
	</div>


</body>

</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>
<script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>
<script src="../../../Views/public/js/table.js"></script>