<html lang="es">

<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css" />
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">
	<!--datables estilo bootstrap 4 CSS-->
	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
</head>

<body>

	<div class="container">
		<div class="jumbotron">
			<div class="text-right">
				<a href="imprimir.php" class="btn btn-warning">Exportar Datos</a>
			</div>
			<div class="container text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
				<h2><strong>Gestión de Usuarios</strong></h2>
				<a href="registro.php" class="btn btn-primary ">Nuevo Usuario</a>
			</div>
		</div>

		<div class="row table-responsive">
			<table id="example" class="table table-striped">
				<thead>
					<tr>
						<th>USUARIOS</th>
						<th>ROL</th>
						<th>EMAIL</th>
						<th>Ciudad</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><?php echo $row['usuario']; ?></td>
							<td><?php echo $row['rol'];	?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['nombre']; ?></td>
							<td><a href="modificar.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
							<td><a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
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

	<script>
		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

			$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
	</script>

</body>

</html>

<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>
<script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>
<script src="../../../Views/public/js/table.js"></script>