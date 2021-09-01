<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class="text-right">
			<a href="imprimir.php" class="btn btn-warning"><i class="fas fa-file-export"></i></a>
		</div>
		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h2><strong>Entidad</strong></h2>
			<a href="registro.php" class="btn btn-dark">Nueva Entidad</a>
		</div>
	</div>
	<br><br><br>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Ciudad</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['identidad']; ?></td>
						<td><?php echo $row['nombreentidad']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><a type="button" class="btn btn-info" href="modificar.php?identidad=<?php echo $row['identidad']; ?>"><i class="fas fa-edit"></i></a></td>
						<td><a type="button" onClick="return confirm('Seguro de borrar este registro?');" class="btn btn-danger" href="eliminar.php?identidad=<?php echo $row['identidad']; ?>"><i class="fas fa-trash-alt"></i></a></td>
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