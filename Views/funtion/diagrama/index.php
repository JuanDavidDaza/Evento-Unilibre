<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<div class="text-right">
				<a href="imprimir.php" class="btn btn-warning"><i class="fas fa-file-export"></i></a>
			</div>
			<img src="../../../Content/logopequeño.png" width="150" class="logo"> <br><br>
			<div class="text-center card border-bottom-danger">
				<hr>
				<h1 class="display-4 font-weight-bold"><strong>Reporte por Evento</strong></h1><br>
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
					<th>Nombre</th>
					<th>Tipo de Evento</th>
					<th>Responsable </th>
					<th>Ciudad</th>
					<th>Mostrar Detalles</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr class="text-center">
						<td><?php echo $row['nombreevento']; ?></td>
						<td><?php echo $row['idtipoeve'];
							?></td>
						<td><?php echo $row['responsable']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><a type="button" class="btn btn-dark" href="diagrama.php?idevento=<?php echo $row['idevento']; ?>"><i class="fas fa-search"></i></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="../reporteve.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>


<!-- GRAFICAS LIBRERIA-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>