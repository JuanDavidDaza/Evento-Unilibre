<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class="text-right">
		<a href="imprimir.php" class="btn btn-warning"><i class="fas fa-file-export"></i></a>
		</div>
		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h2 class="display-4 font-weight-bold"><STRONG>Gestión de Asistencia al Evento</STRONG></h2><br>
			<h2 class="display-4 font-weight-bold"><strong>Evento:</strong> <?php echo $row1['nombreevento']; ?></h2><br>
			<h5>Por favor selecciona una sesión del evento para realizar el control de la asistencia</h5>
			<a href="registro_asistente.php?idevento=<?php echo $idevento ?>" class="btn btn-info">Registrar Nuevo Asistente al Evento</a><br>

		</div>
	</div>
<br><br><br>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Lugar</th>
					<th>HoraInicio</th>
					<th>HoraFin</th>
					<th>fechainicio</th>
					<th>fechafin</th>
					<th>Acción</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['nombresesion']; ?></td>
						<td><?php echo $row['audsalon']; ?></td>
						<td><?php echo date("g:i a", strtotime($row['horainicio'])); ?></td>
						<td><?php echo date("g:i a", strtotime($row['horafin'])); ?></td>
						<td><?php echo $row['fechainicio']; ?></td>
						<td><?php echo $row['fechafin']; ?></td>
						<td><a href="inscritos.php?id=<?php echo $row['id']; ?>&idevento=<?php echo $row['idevento']; ?>" class="btn btn-danger"><i class="fas fa-search"></i></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="row mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="index.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>