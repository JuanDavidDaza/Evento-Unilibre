
<!DOCTYPE HTML><html lang="es">
<head><meta charset="UTF-8">
	<title>Modificar a evento</title>
		
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/estilos2.css">
	<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
	<style type="text/css">
		  .error {
    color: red;
    font-size: 90%;
}
	</style>
	 <script src="../../../Views/public/js/validar_rc.js"></script>
	</head>
	
	<body>
		<div class="container">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
						<h1><strong>Modificar Registro</strong></h1>
						<p>Codigo de la Conferencia | <span class="label label-info"><?php echo $idevento;?></span></p>
					</div>
				</div>

			
			<form class="form-horizontal" onsubmit="return validateForm()" name="contactForm" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombreevento" name="nombreevento" maxlength="100" minlength="5"  value="<?php echo $row['nombreevento']; ?>" >
						<div class="error" id="nombreeventoErr"></div>
					</div>
				</div>

				<div class="form-group">
					<label for="certificado" class="col-sm-2 control-label">¿Realiza Certificado?</label>
					<div class="col-sm-10">
						<select class="form-control" id="certificado" name="certificado">
							<option value="Si" <?php if($row['certificado']=='Si') echo 'selected'; ?>>Si</option>
							<option value="No" <?php if($row['certificado']=='No') echo 'selected'; ?>>No</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="generalinfo" name="generalinfo" maxlength="800" minlength="5"  value="<?php echo $row['generalinfo']; ?>" >
						<div class="error" id="generalinfoErr"></div>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Tema</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tematica" name="tematica" maxlength="100" minlength="5"  value="<?php echo $row['tematica']; ?>" >
						<div class="error" id="tematicaErr"></div>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Responsable</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="responsable" name="responsable" maxlength="100" minlength="5"  value="<?php echo $row['responsable']; ?>" >
						<div class="error" id="responsableErr"></div>
					</div>
				</div>

				

				<div class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="Activo" <?php if($row['estado']=='Activo') echo 'selected'; ?>>Activo</option>
							<option value="Cerrado" <?php if($row['estado']=='Cerrado') echo 'selected'; ?>>Cerrado</option>
						</select>
					</div>
				</div>

				
				<input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
				
				
				


				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Lugar</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="audsalon" name="audsalon"  maxlength="70" minlength="5" value="<?php echo $row1['audsalon']; ?>" >
						<div class="error" id="audsalonErr"></div>
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Hora de Inicio</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" id="horainicio" name="horainicio"  value="<?php echo $row1['horainicio']; ?>" >
						<div class="error" id="horainicioErr"></div>
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Hora de Finalización</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" id="horafin" name="horafin"  value="<?php echo $row1['horafin']; ?>" >
						<div class="error" id="horafinErr"></div>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Fecha de Inicio</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechainicio" name="fechainicio"  value="<?php echo $row1['fechainicio']; ?>" >
						<div class="error" id="fechainicioErr"></div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
				</div>

			<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
					</div>
				</div>
			</form>
</div>

		<div class="container text-center">
				<div class="col-sm-offset-2 col-sm-10">
					<H3 class="page-header text-center" align="center">Editar Programas, Imagenes, Conferencistas, Colaboradores y/o Entidades que están relacionadas con el Evento</H3>
					
					<a class="btn btn-success" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
					<a class="btn btn-success" href="modificar2.php?idevento=<?php echo $row['idevento']; ?>" role="button">PROGRAMAS</a>
					<a class="btn btn-success" href="modificar3.php?idevento=<?php echo $row['idevento']; ?>" role="button">CONFERENCISTAS</a>
					<a class="btn btn-success" href="modificar5.php?idevento=<?php echo $row['idevento']; ?>" role="button">IMAGENES</a>
					<a class="btn btn-success" href="modificar6.php?idevento=<?php echo $row['idevento']; ?>" role="button">COLABORADOR</a>
					<h1></h1>
					<nav>
					<ul class="pagination">
						<li class="page-item"><a href="index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
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