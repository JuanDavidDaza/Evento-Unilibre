<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class="container text-center ">
			<img src="../../../Content/logopequeño.png" width="150" class="logo"> <br><br>
			<div class="text-center card border-bottom-danger">
				<hr>
				<h1 class="display-5 font-weight-bold"><strong>Nombre del Evento: </strong><br> <?php echo $row1['nombreevento']; ?></h1>
				<br>
				<hr>
				<h2>Ciudad : <span class="badge badge-info"><?php echo $nombreciudadevento; ?></span></h2>
				<hr>
			</div><br>
			<a href="index.php" class="btn btn-info">INICIO</a>

		</div>
	</div>
	<br><br><br>
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
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
					if ($row['asistencia'] == $sesiones) { ?>
						<tr>
							<td><?php echo $row['genero']; ?></td>
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $row['tipoid']; ?></td>
							<td><?php echo $row['idasistente']; ?></td>
							<td><?php echo $row['idinstitucion']; ?></td>
							<td><?php echo $row['correo']; ?></td>
							<td><?php echo $row['celular']; ?></td>
						</tr>
				<?php }
				} ?>
			</tbody>
		</table>
	</div>


</div>