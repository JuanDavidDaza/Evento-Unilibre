<!--INICIO del cont principal-->
<div class="container">
	<input id="idciudad" hidden name="idciudad" value="<?php echo $idciudad; ?>" />
	<div class="text-center card border-bottom-danger">
		<h1 class="display-4 font-weight-bold"><strong>Reporte de Conferencistas</strong></h1><br>
		<h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2><br>

	</div><br>
	<div class="container text-center">
		<div class="container col-lg-6">
			<div class="card">
				<div class="card-header">
					Cantidad de Eventos por cada Conferencista
				</div>
				<div class="card-body">
					<canvas id="Conferencista" width="400" height="400"></canvas>
				</div>

				<a href="diagrama/index2.php" class="btn btn-dark">Reporte detallado por Conferencista</a>
			</div>


		</div>

		<br>
		<br>




	</div>




</div>