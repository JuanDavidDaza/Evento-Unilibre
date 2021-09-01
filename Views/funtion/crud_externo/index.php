<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class="text-right">
		<a href="imprimir.php" class="btn btn-warning"><i class="fas fa-file-export"></i></a>
		</div>
		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Externos</strong></h1>
			<a href="registro.php" class="btn btn-dark">Nuevo Evento</a>
		</div>
	</div>
	<br><br><br>

	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripción del Evento</th>
					<th>Tema </th>
					<th>Responsable </th>
					<th>Estado </th>
					<th>Ciudad </th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['nombreevento']; ?></td>
						<td><?php echo $row['generalinfo']; ?></td>
						<td><?php echo $row['tematica']; ?></td>
						<td><?php echo $row['responsable']; ?></td>
						<td><?php echo $row['estado']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><a type="button" class="btn btn-info" href="modificar.php?idevento=<?php echo $row['idevento']; ?>"><i class="fas fa-edit"></i></a></td>
						<td><a type="button" onClick="return confirm('Seguro de borrar este registro?');" class="btn btn-danger" href="eliminar.php?idevento=<?php echo $row['idevento']; ?>"><i class="fas fa-trash-alt"></i></a></td>
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