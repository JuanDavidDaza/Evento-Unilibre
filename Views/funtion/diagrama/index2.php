<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo"> <br><br>
			<div class="text-center card border-bottom-danger">
				<hr>
				<h1 class="display-4 font-weight-bold"><strong>Reporte por Conferencista</strong></h1><br>
				<h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2>
				<hr><br>
			</div>
		</div>
	</div>
	<br><br><br>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr class="text-center">
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Cantidad de Eventos</th>
					<th>Mostrar Detalles</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr class="text-center">
						<td><?php echo $row['cedula']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['cantidad']; ?></td>
						<td><a class="btn btn-primary" href="diagrama2.php?cedula=<?php echo $row['cedula']; ?>">Ir</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="../reportconf.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>