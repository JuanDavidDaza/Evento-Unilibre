<div class="container">
	<div class="text-center card border-bottom-danger">
		<h1 class="display-4 font-weight-bold"><strong>Reporte de Eventos</strong></h1><br>
		<h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2><br>

	</div><br>


	<input id="idciudad" hidden name="idciudad" value="<?php echo $idciudad; ?>" />
	<div class="container text-center">
		<br>
		<div class="container col-lg-6">
			<div class="card">
				<div class="card-header">
					Total de Eventos Registrados
				</div>
				<div class="card-body">
					<canvas id="graficopie" width="400" height="400"></canvas>
				</div>

				<a href="diagrama/index.php" class="btn btn-dark">Reporte detallado por EVENTO</a>
			</div>


		</div>
		<br>
		<br>
		<div class="row ">

			<div class="card col-lg-6">
				<div class="card-header">
					Eventos Activos
				</div>
				<div class="card-body">
					<canvas id="graficopie1" width="400" height="400"></canvas>
				</div>
			</div>
			<div class="card col-lg-6">
				<div class="card-header">
					Eventos Cerrados
				</div>
				<div class="card-body">
					<canvas id="graficopie2" width="400" height="400"></canvas>
				</div>
			</div>

		</div>
		<br>
		<br>
		<hr>












	</div>




</div>