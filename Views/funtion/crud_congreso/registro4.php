
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
    <link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	</head>
	
	<body>
		<div class="container">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
						<h1><strong>Adicionar Sesiones del Evento</strong></h1>
						<h3>Nombre del Congreso | <span class="label label-info"><?php echo $nombreevento;?></span></h3>
					</div>
				</div>
		</div>

			
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<button id="addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Asignar Sesión</button>
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
	</div>
</div>
<div class="container text-center">
				
		<H3 class="page-header text-center" align="center"></H3>
		<a class="btn btn-success btn-lg btn-block" href="registro5.php?idevento=<?php echo $row['idevento']; ?>" role="button">SIGUIENTE</a>			
		<h1></h1>
				
</div>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
<?php include('../../../Views/public/bootstrap/modal.php'); ?>
<script src="../../../Views/public/js/appsesionescong.js"></script>

</body>
</html>
