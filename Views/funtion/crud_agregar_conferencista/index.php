<html lang="es">

<head>



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../../../Views/public/bootstrap/css/main.css">
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

</head>


<body>
	<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>

	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<div class="text-right">
					<a href="imprimir.php" class="btn btn-warning">Exportar Datos</a>
				</div>

				<div class="container text-center">
					<img src="../../../Content/logopequeño.png" width="150" class="logo">
					<h1><strong>Conferencistas</strong></h1>
					<div class="row">
						<a href="registro.php" class="btn btn-primary">Nuevo Conferencista</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row table-responsive">
			<table id="example" class="table table-striped">
				<thead>
					<tr>
						<th>Foto</th>
						<th>Cedula</th>
						<th>Nombre</th>
						<th>Correo </th>
						<th>Linkedin</th>
						<th>Perfil</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><img class="img-thumbnail" width="100px" src="../../../Content/imagenes_conferencistas/<?php echo $row['foto']; ?>"></td>
							<td><?php echo $row['cedula']; ?></td>
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $row['correo']; ?></td>
							<td><?php echo $row['linkedin']; ?></td>
							<td><?php echo $row['perfil']; ?></td>
							<td><a href="modificar.php?cedula=<?php echo $row['cedula']; ?>" class="btn btn-primary active" role="button">Modificar</a></td>
							<td><a href="#" class="btn btn-danger active" data-href="eliminar.php?cedula=<?php echo $row['cedula']; ?>" data-toggle="modal" data-target="#confirm-delete" role="button">Eliminar</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item "><a href="../index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
				</div>

				<div class="modal-body">
					¿Desea eliminar este Evento y todos sus registros relacionados?
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a class="btn btn-danger btn-ok">Delete</a>
				</div>
			</div>
		</div>
	</div>



</body>

</html>
<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

		$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
	});
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>
<script src="../../../Views/public/js/table.js"></script>