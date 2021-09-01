<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Conferencistas Registrardos</strong></h1>
			<div class="text-center">
				<a href="index.php" class="btn btn-dark">INICIO</a>
			</div>
		</div>
		<br>
		<br>
	</div>

	<div class="table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Correo </th>
					<th>Celular 1 </th>
					<th>Celular 2 </th>
					<th>Correo</th>
					<th>Linkedin</th>
					<th>Perfil</th>
					<th>Pais</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><img class="img-thumbnail" width="100px" src="../../../Content/imagenes_conferencistas/<?php echo $row['foto']; ?>"></td>
						<td><?php echo $row['cedula']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['correo']; ?></td>
						<td><?php echo $row['celular1']; ?></td>
						<td><?php echo $row['celular2']; ?></td>
						<td><?php echo $row['correo']; ?></td>
						<td><?php echo $row['linkedin']; ?></td>
						<td><?php echo $row['perfil']; ?></td>
						<td><?php echo $row['pais']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>