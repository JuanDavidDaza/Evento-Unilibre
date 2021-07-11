<html lang="es">

<head>
	<!--datables CSS básico-->
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css" />
	<!--datables estilo bootstrap 4 CSS-->
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

</head>

<body>

	<div class="container">
		<div class="jumbotron">
			<div class="container text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo"> <br><br>
				<div class="text-center card border-bottom-danger">
					<hr>
					<h1 class="display-4 font-weight-bold"><strong>Reporte por Programa</strong></h1><br>
					<h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2>
					<hr>
				</div>
			</div>
		</div>
		<div class="row table-responsive">
			<table id="example" class="table table-striped">
				<thead>
					<tr class="text-center">
						<th>Programa</th>
						<th>Cantidad de Eventos</th>
						<th>Mostrar Detalles</th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr class="text-center">
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $row['cantidad']; ?></td>
							<td><a class="btn btn-primary" href="diagrama3.php?programa=<?php echo $row['programa']; ?>">Ir</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item "><a href="../reportprog.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</body>

</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- GRAFICAS LIBRERIA-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>
<script src="../../../Views/public/js/table.js"></script>