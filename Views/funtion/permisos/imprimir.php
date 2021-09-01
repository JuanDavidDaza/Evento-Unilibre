<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>PERMISOS</strong></h1>
			<a href="index.php" class="btn btn-dark btn-lg">INICIO</a>
		</div>

	</div>
	<br><br><br>
	<div class="table table-responsive">
		<table id="example" class="table table-striped">
			<thead>
				<tr>
					<th>USUARIOS</th>
					<th>ROL</th>
					<th>EMAIL</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['usuario']; ?></td>
						<td><?php echo $row['rol'];	?></td>
						<td><?php echo $row['email']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="index.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>