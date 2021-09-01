<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Modificar Programas del Evento</strong></h1>
			<h3>Nombre de la Reunión | <span class="badge badge-info"><?php echo $nombreevento; ?></span></h3>
		</div>
	</div>
	<br><br><br>



	<div class="container">

		<button id="addnew" class="btn btn-dark"><span class="glyphicon glyphicon-plus"></span>Asignar Programa</button><br>
		<i>Si no esta registrada el Programa que buscas por favor dale <a href="../crud_programas/index.php" target="_blank">Clic aqui</a></i><br>

		<div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<span id="alert_message"></span>
		</div>
		<table class="table table-bordered table-striped" style="margin-top:20px;">
			<thead>
				<th>ID</th>
				<th>Programa</th>
				<th>idevento</th>
				<th>Acción</th>
			</thead>
			<tbody id="tbody">

			</tbody>
		</table>


	</div>

	<div class="container text-center jumbotron">

		<h4 class="text-center font-weight-bold">Editar Datos, Imagenes y/o Entidades del Evento</h4><br>

		<a class="btn btn-dark" href="modificar.php?idevento=<?php echo $row['idevento']; ?>" role="button">DATOS</a>
		<a class="btn btn-dark" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
		<a class="btn btn-dark" href="modificar5.php?idevento=<?php echo $row['idevento']; ?>" role="button">IMAGENES</a>
		<br>
		<br>
		<a href="index.php" class="page-link">&larr; Regresar</a>

	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- LLamamos a Modal -->
	<?php include('../../../Views/public/bootstrap/modal.php'); ?>
	<script src="../../../Views/public/js/appprograma.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#programa').select2({
				placeholder: 'Escoge una'
			});
		});
	</script>