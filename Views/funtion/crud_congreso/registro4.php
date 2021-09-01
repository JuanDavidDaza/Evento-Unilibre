<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Adicionar Sesiones del Evento</strong></h1>
			<h3>Nombre del Congreso | <span class="badge badge-info"><?php echo $nombreevento; ?></span></h3>
		</div>
	</div>
	<br><br><br>
</div>


<div class="container">
	<button id="addnew" class="btn btn-dark"><span class="glyphicon glyphicon-plus"></span>Asignar Sesión</button>
	<div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<span id="alert_message"></span>
	</div>
	<table class="table table-bordered table-striped" style="margin-top:20px;">
		<thead>
			<th>Numero de la Sesión</th>
			<th>Nombre</th>
			<th>Lugar</th>
			<th>Hora Inicio</th>
			<th>Hora Fin</th>
			<th>Fecha Inicio</th>
			<th>Fecha Fin</th>
			<th>Observación</th>
			<th>Acción</th>
		</thead>
		<tbody id="tbody"></tbody>
	</table>

</div>
<div class="jumbotron text-center">
	<a class="btn btn-dark btn-lg btn-block" href="registro5.php?idevento=<?php echo $row['idevento']; ?>" role="button">SIGUIENTE</a>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php include('../../../Views/public/bootstrap/modal.php'); ?>
<script src="../../../Views/public/js/appsesiones.js"></script>