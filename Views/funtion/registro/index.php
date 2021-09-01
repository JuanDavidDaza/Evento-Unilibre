<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Control de Página de Registro</strong></h1>

		</div>

	</div>
	<br><br><br>

	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>Nombre de la Institució o Entidad</th>
					<th>Numero de Personas</th>
					<th>Ciudad</th>
					<th>Modificar</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['registro']; ?></td>
						<td><?php echo $row['cantidad']; ?></td>
						<td><?php echo $row['nombre']; ?></td>

						<td><a href="mostrar.php?registro=<?php echo $row['registro']; ?>"><span class="fas fa-pencil"></span></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="../index.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>