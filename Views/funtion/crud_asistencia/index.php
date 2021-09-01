<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class="text-right">
			<a href="imprimir.php" class="btn btn-warning"><i class="fas fa-file-export"></i></a>
		</div>
		<div class="text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h2 class="display-5"><STRONG> Gestión de Asistencia al Evento</STRONG></h2><br>
			<hr>
			<h2 class="display-4 font-weight-bold"><strong>EVENTOS DISPONIBLES</strong></h2>
			<hr>

		</div>
		<br>
		<br>
	</div>

	<div class="container table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Tipo de Evento</th>
					<th>Tema </th>
					<th>Responsable </th>
					<th>Estado </th>
					<th>Ciudad </th>
					<th>Ver Inscritos</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['idevento']; ?></td>
						<td><?php echo $row['nombreevento']; ?></td>
						<td><?php echo $row['nombretipo']; ?></td>
						<td><?php echo $row['tematica']; ?></td>
						<td><?php echo $row['responsable']; ?></td>
						<td><?php echo $row['estado']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><a href="sesion.php?idevento=<?php echo $row['idevento']; ?>"><i class="fas fa-file-export"></i></a></td>
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