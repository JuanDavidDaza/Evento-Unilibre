<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Reporte por Evento</strong></h1><br>
			<h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2>
			<hr><br>
			<a href="index.php" class="btn btn-primary btn-lg">INICIO</a>
		</div>

	</div>
	<br><br><br>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr class="text-center">
					<th>Nombre</th>
					<th>Tipo de Evento</th>
					<th>Responsable </th>
					<th>Programa</th>
					<th>Entidad</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody class="text-center">
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['nombreevento']; ?></td>
						<td><?php echo $row['idtipoeve']; ?></td>
						<td><?php echo $row['responsable']; ?></td>
						<td><?php echo $row['PROGRAMA']; ?></td>
						<td><?php echo $row['nombreentidad']; ?></td>
						<td><?php echo $row['estado']; ?></td>
					<?php } ?>

					<?php for ($i = 0; $i < $c; $i++) {
						echo $impent[$i];
					}
					for ($a = 0; $a < $c1; $a++) {
						echo $impprog[$a];
					} ?>

					</tr>
			</tbody>
		</table>
	</div>
</div>
<div class=" mt-3">
	<div class="col">
		<nav>
			<ul class="pagination">
				<li class="page-item "><a href="index.php" class="page-link">&larr; Regresar</a></li>
			</ul>
		</nav>
	</div>
</div>
</div>