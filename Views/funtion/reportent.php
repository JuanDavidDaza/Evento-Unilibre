<!--INICIO del cont principal-->
<div class="container">
	<input id="idciudad" hidden name="idciudad" value="<?php echo $idciudad; ?>" />
	<div class="text-center card border-bottom-danger">
		<h1 class="display-4 font-weight-bold"><strong>Reporte de Entidades</strong></h1><br>
		<h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2><br>

	</div><br>
	<div class="container text-center">
		<div class="container col-lg-6">
			<div class="card">
				<div class="card-header">
					Cantidad de Eventos por Entidad
				</div>
				<div class="card-body">
					<canvas id="Entidades" width="400" height="400"></canvas>
				</div>

				<a href="diagrama/index4.php" class="btn btn-dark">Reporte detallado por Entidad</a>
			</div>


		</div>

		<br>
		<br>


















	</div>




</div>