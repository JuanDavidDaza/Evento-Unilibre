
<html lang="es">
	<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
    <link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
    <style type="text/css">
        .select2 {
width:100%!important;
}
    </style>
	</head>
	
	<body>
		<div class="container">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
						<h1><strong>Inscripción al Evento : <?php echo $row1['nombreevento']; ?></strong></h1>
					</div>
				</div>
		</div>
		<div class="container">
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">

				<div class="form-group">
					<label for="idasistente" class="col-sm-2 control-label">Numero de Identificación</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="idasistente" name="idasistente" placeholder="Nombre" value="<?php echo $row['idasistente']; ?>" required>
					</div>
				</div>

			<input type="hidden" class="form-control" id="idasistenteviejo" name="idasistenteviejo" placeholder="Nombre" value="<?php echo $row['idasistente']; ?>" required>

					<div class="form-group">
					<label for="tipoid" class="col-sm-2 control-label">Tipo de Documento</label>
					<div class="col-sm-10">
						<select class="form-control" id="tipoid" name="tipoid">
							<option value="TI" <?php if($row['tipoid']=='TI') echo 'selected'; ?>>Tarjeta de identidad</option>
							<option value="CC" <?php if($row['tipoid']=='CC') echo 'selected'; ?>>Cédula de ciudadanía</option>
							<option value="CE" <?php if($row['tipoid']=='CE') echo 'selected'; ?>>Cédula de extranjería</option>
						</select>
					</div>
				</div>

							<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">correo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="correo" name="correo" placeholder="Nombre" value="<?php echo $row['correo']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">celular</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="celular" name="celular" placeholder="Nombre" value="<?php echo $row['celular']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="genero" class="col-sm-2 control-label">Genero</label>
					<div class="col-sm-10">
						<select class="form-control" id="genero" name="genero">
							<option value="M" <?php if($row['genero']=='M') echo 'selected'; ?>>Masculino</option>
							<option value="F" <?php if($row['genero']=='F') echo 'selected'; ?>>Femenino</option>
							<option value="No desea responder" <?php if($row['genero']=='No desea responder') echo 'selected'; ?>>No desea responder</option>
						</select>
					</div>
				</div>

				<div class="form-group ">
			    	<label>Institución o Entidad</label>
			    	<select name="idinstitucion" id="idinstitucion" class="form-control item_unit" ><?php echo institucion_educativap($connect,$idciudad,$idinstitucion); ?></select>
			    </div>
				
				<input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
				
					
				<div class="form-group">
					<div >
						<button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button>
					</div>
				</div>
			</form>


	<h1 class="page-header text-center"><strong> Sesiones Inscritas</strong></h1>
	<div class="container"> 
	<div class="row">
		<h3 class="page-header text-center">Sesiones Activas de este Evento</h3>
		<div class="col-sm-12">
            <div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
            	  <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span id="alert_message"></span>
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>idsesion</th>
					<th>Nombre</th>
					<th>Lugar</th>
					<th>HoraInicio</th>
					<th>HoraFin</th>
					<th>fechainicio</th>
					<th>fechafin</th>
					<th>Acción</th>
				</thead>
				<tbody id="tbody">

				</tbody>
			</table>
		</div>
		<h3 class="page-header text-center">Sesiones Inscritas</h3>
		<div class="col-sm-12">
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>idasistente</th> 
					<th>idevento</th>
					<th>idsesion</th>
					<th>tipoid</th>
					<th>nombre</th>
					<th>Acción</th>
				</thead>
				<tbody id="tbody1">

				</tbody>
			</table>
		</div>
	</div>
	</div>

	<h1></h1>
	<a href="inscritos.php?id=<?php echo $id;?>&idevento=<?php echo $row['idevento'];?>" class="btn btn-primary btn-lg btn-block ">Regresar</a>
	<h1></h/>
</div>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
</html>
<!-- LLamamos a Modal -->
<?php include('../../../Views/public/bootstrap/modal.php'); ?>
<script src="../../../Views/public/js/asistencia.js"></script>


<script>
	//var idevento1=<?php echo $idevento1; ?>;
	var idasistente=<?php echo $idasistente; ?>;	
</script>


<script type="text/javascript">
    $(document).ready(function(){
            $('#idinstitucion').select2({placeholder: 'Escoge una' });
    });
</script>
