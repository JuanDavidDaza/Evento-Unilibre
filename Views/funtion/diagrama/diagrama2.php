<div class="container">
	<div class="text-center card border-bottom-danger">
		<img src="../../../Content/logopequeño.png" width="150" class="logo">
		<div class="container text-center card ">
			<hr>
			<h1><strong>Conferencista : <span class="badge badge-primary"> <?php echo $nombre; ?></span></strong></h1>
			<h2><strong>Ciudad : <span class="badge badge-info"><?php echo $row3['nombreciudad']; ?></span> </strong></h2>
			<hr>
		</div>
	</div>
	<br><br><br>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr class="text-center">
					<th>Nombre del Evento</th>
					<th>Conferencista</th>
					<th>Nombre de la Conferencia</th>
					<th>Duración</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($resultado3 as $row3) { ?>
					<tr class="text-center">
						<td><?php echo $row3['nombreevento']; ?></td>
						<td><?php echo $nombre;	?></td>
						<td><?php echo $row3['conferencia']; ?></td>
						<td><?php echo $row3['duracion']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="index2.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>