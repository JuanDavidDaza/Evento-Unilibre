<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Adicionar Imagenes del Evento</strong></h1>
			<h3>Nombre del Congreso | <span class="badge badge-info"><?php echo $nombreevento; ?></span></h3>
		</div>
	</div>
	<br><br><br>
</div>


<div class="container">
	<a href="imagen.php?idevento=<?php echo $row['idevento']; ?>&e=1" class="btn btn-dark"><span class="glyphicon glyphicon-plus"></span>Asignar Imagen</a>

	<table class="table table-bordered table-striped" style="margin-top:20px;">
		<thead>
			<th>Imagen</th>
			<th>Nombre</th>
			<th>Detalles</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			<?php while ($row2 = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
				<tr>
					<td><img class="img-thumbnail" width="100px" src="../../../Content/evento_foto/<?php echo $row2['foto']; ?>"></td>
					<td><?php echo $row2['nombre']; ?></td>
					<td><?php echo $row2['detalles']; ?></td>
					<td><?php echo $row2['tipo']; ?></td>
					<td><a class="btn btn-danger" href="?delete_id=<?php echo $row2['id']; ?>" title="click for delete" onclick="return confirm('Esta seguro de eliminar el archivo?')">Eliminar</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

</div>
<div class="jumbotron text-center">
	<a class="btn btn-dark btn-lg btn-block" href="registro6.php?idevento=<?php echo $row['idevento']; ?>" role="button">SIGUIENTE</a>
</div>