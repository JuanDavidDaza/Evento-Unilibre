<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Entidad</strong></h1>
			<a href="index.php" class="btn btn-dark">INICIO</a>
		</div>

	</div>
	<br><br><br>

	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Url</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['identidad']; ?></td>
						<td><?php echo $row['nombreentidad']; ?></td>
						<td><?php echo $row['url']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
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