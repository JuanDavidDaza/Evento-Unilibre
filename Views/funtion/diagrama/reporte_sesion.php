<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="#" />
	<title>Reporte <?php echo $fechaActual . " || " . $row1['nombreevento']; ?></title>
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../../Views/public/bootstrap/css/bootstrap.min.css">

	<!--datables CSS básico-->
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css" />
	<!--datables estilo bootstrap 4 CSS-->
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

	<!--font awesome con CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<style type="text/css">
		thead input {
			width: 100%;
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="jumbotron">
			<div class="container text-center ">
				<img src="../../../Content/logopequeño.png" width="150" class="logo"> <br><br>
				<div class="text-center card border-bottom-danger">
					<hr>
					<h1 class="display-5 font-weight-bold"><strong>Nombre del Evento: </strong><br> <?php echo $row1['nombreevento']; ?></h1>
					<br>
					<hr>
					<h2>Ciudad : <span class="badge badge-info"><?php echo $nombreciudadevento; ?></span></h2>
					<hr>
				</div><br>
				<a href="index.php" class="btn btn-info">INICIO</a>

			</div>
		</div>
		<div class="row table-responsive">
			<table id="example" class="table table-striped">
				<thead>
					<tr>
						<th>Genero (F-M)</th>
						<th>Nombre y Apellidos</th>
						<th>Tipo Documento</th>
						<th>Número de Documento</th>
						<th>Programa/Dependencia</th>
						<th>Correo</th>
						<th>Celular</th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
						if ($row['asistencia'] == $sesiones) { ?>
							<tr>
								<td><?php echo $row['genero']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['tipoid']; ?></td>
								<td><?php echo $row['idasistente']; ?></td>
								<td><?php echo $row['idinstitucion']; ?></td>
								<td><?php echo $row['correo']; ?></td>
								<td><?php echo $row['celular']; ?></td>
							</tr>
					<?php }
					} ?>
				</tbody>
			</table>
		</div>


	</div>
	<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
	<!-- jQuery, Popper.js, Bootstrap JS -->
	<script src="../../../Views/public/js/jquery-3.3.1.min.js"></script>
	<script src="../../../Views/public/popper/popper.min.js"></script>
	<script src="../../../Views/public/bootstrap/js/bootstrap.min.js"></script>

	<!-- datatables JS -->
	<script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>

	<!-- para usar botones en datatables JS -->
	<script src="../../../Views/public/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="../../../Views/public/datatables/JSZip-2.5.0/jszip.min.js"></script>
	<script src="../../../Views/public/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
	<script src="../../../Views/public/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script src="../../../Views/public/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

	<script type="text/javascript" src="../../../Views/public/js/imprimir.js"></script>


</body>

</html>