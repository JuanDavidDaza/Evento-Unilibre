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
				<h1><strong>Modificar Imagenes del Evento</strong></h1>
				<h3>Nombre de la Conferencia | <span class="label label-info"><?php echo $nombreevento; ?></span></h3>

			</div>
		</div>
	</div>



	<div class="container">
		<a href="imagen.php?idevento=<?php echo $row['idevento']; ?>&e=2" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Asignar Imagen</a>
		<div class="row">
			<div class="col-sm-12">
			</div>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>Imagen</th>
					<th>Nombre</th>
					<th>Detalles</th>
					<th>Tipo</th>
					<th>Acción</th>
				</thead>
				<tbody>
					<?php while ($row2 = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><img class="img-thumbnail" width="100px" src="../../../Content/evento_foto/<?php echo $row2['foto']; ?>"></td>
							<td><?php echo $row2['nombre']; ?></td>
							<td><?php echo $row2['detalles']; ?></td>
							<td><?php echo $row2['tipo']; ?></td>
							<td><a class="btn btn-danger" href="?delete_id=<?php echo $row2['id']; ?>" title="click for delete" onclick="return confirm('Esta seguro de eliminar el archivo?')">Eliminar</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="container text-center">

		<H3 class="page-header text-center" align="center">Editar Datos, Conferencistas, Programas, Colaborador y/o Entidades del Evento</H3>

		<a class="btn btn-success" href="modificar.php?idevento=<?php echo $row['idevento']; ?>" role="button">DATOS</a>
		<a class="btn btn-success" href="modificar2.php?idevento=<?php echo $row['idevento']; ?>" role="button">PROGRAMAS</a>
		<a class="btn btn-success" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
		<a class="btn btn-success" href="modificar3.php?idevento=<?php echo $row['idevento']; ?>" role="button">CONFERENCISTAS</a>
		<a class="btn btn-success" href="modificar6.php?idevento=<?php echo $row['idevento']; ?>" role="button">COLABORADOR</a>
		<h1></h1>
		<nav>
			<ul class="pagination">
				<li class="page-item"><a href="index.php" class="page-link">&larr; INICIO</a></li>
			</ul>
		</nav>

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
	<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
</body>

</html>