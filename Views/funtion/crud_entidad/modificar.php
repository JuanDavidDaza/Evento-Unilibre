
<html lang="es">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
	</head>
	
	<body>
		<div class="container">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150"> 
						<h1><strong>Modificar Registro</strong></h1>
						<p>Codigo de la Entidad | <span class="label label-info"><?php echo $identidad;?></span></p>
					</div>
				</div>

			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombreentidad" name="nombreentidad" placeholder="Por favor escribe el nombre de la Entidad" value="<?php echo $row['nombreentidad']; ?>" required>
					</div>
					<input type="hidden" class="form-control" id="nombreentidad1" name="nombreentidad1" placeholder="Por favor escribe la URL" value="<?php echo $row['nombreentidad']; ?>" required>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">URL</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="url" name="url" placeholder="url" value="<?php echo $row['url']; ?>" >
						<i>Si la entidad no tiene URL se pondra por defecto esta https://www.unilibrecali.edu.co</i>
					</div>
				</div>

				<input type="hidden" id="identidad" name="identidad" value="<?php echo $row['identidad']; ?>" />
				<div class="form-group">
					<label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
				</div>
				

			<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
					</div>
				</div>
			</form>
		<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item"><a href="index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
			

</div>
</body>
</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
            $('#idciudad').select2({placeholder: 'Escoge una' });
    });
</script>
