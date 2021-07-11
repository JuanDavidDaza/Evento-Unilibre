<html lang="es">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
	<script src="../../../Views/public/js/select2.js"></script>
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

</head>

<body>
	<div class="container">

		<div class="jumbotron">
			<div class="container text-center">
				<img src="../../../Content/logopequeño.png" width="150">
				<h1><strong>Adicionar Programas del Evento</strong></h1>
				<p>Nombre de la Conferencia | <span class="label label-info"><?php echo $nombreevento; ?></span></p>
			</div>
		</div>



		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<button id="addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Asignar Programa</button><br>
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

			</div>

		</div>
		<div class="container text-center">

			<H3 class="page-header text-center" align="center">Clic en siguiente para registrar Conferencistas al Evento</H3>
			<a class="btn btn-success btn-lg btn-block" href="registro3.php?idevento=<?php echo $row['idevento']; ?>" role="button">SIGUIENTE</a>
			<h1></h1>

		</div>
		<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
		<script src="../../../Views/public/js/sesion2.js"></script>
		<!-- LLamamos a Modal -->
		<?php include('../../../Views/public/bootstrap/modal.php'); ?>
		<script src="../../../Views/public/js/appprogramaconf.js"></script>
</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
		$('#programa').select2({
			allowClear: true,
			placeholder: 'Escoge una'
		});
	});
</script>