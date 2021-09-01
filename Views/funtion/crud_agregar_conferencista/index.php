<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="text-right">
			<a href="imprimir.php" class="btn btn-warning"><i class="fas fa-file-export"></i></a>
		</div>

		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Conferencistas</strong></h1>
			<a href="registro.php" class="btn btn-dark">Nuevo Conferencista</a>
		</div>
	</div>
<br><br><br>

	<div class="table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Correo </th>
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
						<td><?php echo $row['perfil']; ?></td>
						<td><a href="modificar.php?cedula=<?php echo $row['cedula']; ?>" class="btn btn-primary active" role="button"><i class="fas fa-pencil-alt"></i></a></td>
						<td><a type="button" onClick="return confirm('Seguro de borrar este registro?');" class="btn btn-danger" href="eliminar.php?cedula=<?php echo $row['cedula']; ?>"><i class="fas fa-trash-alt"></i></a></td>
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