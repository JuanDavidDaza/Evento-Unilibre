<html lang="es">

<head>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">
	<!--font awesome con CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
	<div>

	</div>


	<div class="container">
		<div class="">
			<div class="jumbotron">
				<div class="container text-center">
					<img src="../../../Content/logopequeño.png" width="150" class="logo">
					<h2><strong>UNIVERSIDAD LIBRE</strong></h2>
					<h2><strong>SISTEMA DE GESTIÓN DE EVENTOS</strong></h2> <br>
					<h2><strong>Gestión de Estado del Evento</strong></h2>
					<ul class="pagination">
						<li class="btn page-item "><a href="../index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</div>
			</div>
		</div>

		<form id="dato" name="dato">
			<input type="number" name="idciudad" hidden id="idciudad" value="<?php echo $idciudad; ?>">

		</form>
		<hr>
		<div class="jumbotron">
			<p>Se podrá gestionar individualmente cada evento mostrando que sesiones tiene activas hasta la fecha actual y poder cambiar el estado del evento ó el sistema tomará los eventos que tenga todas las sesiones en estado <strong>Finalizado</strong> y cambiará el estado del evento a <strong>Cerrado.</strong></p><br>

		</div>
		<hr>
		<div class="jumbotron">
			<ul>
				<p>Cambiar el estado de los Eventos por <strong>Cerrado</strong>,donde las sesiones esten en estado <strong>Finalizado</strong></p><button type="button" name="registro" class="button btn-danger btn-lg registro " data-user_id="<?php echo $idciudad; ?>">Clic Aqui para Registrar</button>
			</ul>
		</div>
		<hr>
		<span id="message"></span>
		<div class="jumbotron">
			<div class="card-body">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span></span>
					<input type="text" name="search_box" id="search_box" class="form-control" placeholder="Buscar" />

				</div><br>


				<div class="table-responsive" id="dynamic_content">

				</div>
			</div>



			<div class="row mt-3">
				<div class="col">
					<nav>
						<ul class="pagination">
							<li class="page-item "><a href="../index.php" class="page-link">&larr; Regresar</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>




</body>

</html>
<script type="text/javascript" src="../../../Views/public/js/estado_evento.js"></script>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>