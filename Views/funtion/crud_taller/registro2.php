<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150">
			<h1 class="display-4 font-weight-bold"><strong>Adicionar Programas del Evento</strong></h1>
			<h3>Nombre del Taller | <span class="badge badge-info"><?php echo $nombreevento; ?></span></h3>
		</div>
	</div>
	<br><br><br>



	<div class="container">

		<button id="addnew" class="btn btn-dark"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo</button><br>
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
	<div class="jumbotron text-center">
		<a class="btn btn-dark btn-lg btn-block" href="registro4.php?idevento=<?php echo $row['idevento']; ?>" role="button">SIGUIENTE</a>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php include('../../../Views/public/bootstrap/modal.php'); ?>
<script src="../../../Views/public/js/appprograma.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#programa').select2({
			placeholder: 'Escoge una'
		});
	});
</script>