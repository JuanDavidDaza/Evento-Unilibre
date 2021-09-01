<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class="text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h2 class="display-4 font-weight-bold"><strong>Nombre del Evento: <?php echo $row1['nombreevento']; ?></strong></h2>
			<h3 class="display-4 font-weight-bold">Lista de Pre-Inscritos</h3>
			<a href="index.php" class="btn btn-dark">INICIO</a>
		</div>
		<br>
		<br>
	</div>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>Genero (F-M)</th>
					<th>Nombre y Apellidos</th>
					<th>Tipo Documento</th>
					<th>Número de Documento</th>
					<th>Programa/Dependencia</th>
					<th>Correo</th>
					<th>Celular</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['genero']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['tipoid']; ?></td>
						<td><?php echo $row['idasistente']; ?></td>
						<td><?php echo $row['idinstitucion']; ?></td>
						<td><?php echo $row['correo']; ?></td>
						<td><?php echo $row['celular']; ?></td>


					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>


</div>