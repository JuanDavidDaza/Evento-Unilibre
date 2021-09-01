<div class="container">
	<input id="idciudad" hidden name="idciudad" value="<?php echo $idciudad; ?>" />
	<input id="programa" hidden name="programa" value="<?php echo $row3['programa']; ?>" />
	<div class="text-center card border-bottom-danger">
		<img src="../../../Content/logopequeño.png" width="150" class="logo">

		<hr>
		<h1><strong>Programa : <span class="badge badge-primary"> <?php echo $row3['nombre']; ?></span></strong></h1>
		<h2><strong>Ciudad : <span class="badge badge-info"><?php echo $nombreciudadevento; ?></span> </strong></h2>
		<hr>

	</div>
	<br><br><br>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr class="text-center">
					<th>Nombre del Programa</th>
					<th>Codigo del Evento</th>
					<th>Evento</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($resultado3 as $row3) { ?>
					<tr class="text-center">
						<td><?php echo $row3['nombre']; ?></td>
						<td><?php echo $row3['idevento']; ?></td>
						<td><?php echo $row3['nombreevento']; ?></td>
						<td><?php echo $row3['estado']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<br>
	<div class="card">

		<header class="container text-center">
			<h3><span class="badge badge-primary">Estado del Evento en el Programa</span> || <span class="badge badge-success"><?php echo $row3['nombre']; ?></span></h3>
		</header>

		<div class="container text-center">
			<canvas id="estado" width="80"></canvas>
			<h3></h3>
		</div>

	</div>
	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="index3.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>