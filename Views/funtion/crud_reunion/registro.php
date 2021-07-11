
<!DOCTYPE HTML><html lang="es">
<head><meta charset="UTF-8">
	<title>Adicionar a evento</title>
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/estilos2.css">
	<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	<script src="../../../Views/public/js/validar_rc.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
	<style type="text/css">
		  .error {
    color: red;
    font-size: 90%;
}
	</style>
</head>
<body>
	<div class="container"> 
		<div class="row">
			<div class="col">
				<form method="POST"  name="contactForm" onsubmit="return validateForm()" action="registroe.php">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo">
						<h1><strong>Tipo de evento: Reunión</strong></h1>
						<h4><i><strong>Esta Reunión será registrado en la ciudad que actualmente tiene seleccionada.</strong></i></h4>
					</div>
				</div>


				<div class="form-group"><label for="nombreevento">Nombre del Evento</label><input maxlength="100" minlength="5" type="text" class="form-control"  name="nombreevento" id="nombreevento"/>
					<div class="error" id="nombreeventoErr"></div>
				</div>
				 
				<div class="form-group"><label for="generalinfo">Descripción</label><input maxlength="800" minlength="5" type="text" class="form-control"  name="generalinfo" id="generalinfo"/>
					<div class="error" id="generalinfoErr"></div>
				</div>

				<div class="form-group"><label for="idtipoeve">¿Reunión Virtual?</label>
					<select name="idtipoeve" class="form-control">
				    <!-- Opciones de la lista -->
				    <option value="5">Si</option>
				    <option value="1" selected>No</option> <!-- Opción por defecto -->
				  </select>
				</div>

				<div class="form-group"><label for="tematica">Tema</label><input type="text" maxlength="100" minlength="5" class="form-control"  name="tematica" id="tematica"/>
					<div class="error" id="tematicaErr"></div>
				</div>

				<div class="form-group"><label for="responsable">Responsable</label><input type="text" maxlength="100" minlength="5" class="form-control"  name="responsable" id="responsable"/>
					<div class="error" id="responsableErr"></div>
				</div>

				<div class="form-group"><label for="audsalon">Lugar</label><input type="text"  maxlength="70" minlength="5" class="form-control"  name="audsalon" id="audsalon"/>
					<div class="error" id="audsalonErr"></div>
				</div>


				<div class="form-group"><label for="horainicio">Hora de Inicio</label><input  type="time" class="form-control"  name="horainicio" id="horainicio" required/>
					<div class="error" id="horainicioErr"></div>
				</div>

				<div class="form-group"><label for="horafin">Hora de Finalización</label><input type="time" class="form-control"  name="horafin" id="horafin" required/>
					<div class="error" id="horafinErr"></div>
				</div>

				<div class="form-group"><label for="fechainicio">Fecha de Inicio</label><input type="date" class="form-control"  name="fechainicio" id="fechainicio"/>
					<div class="error" id="fechainicioErr"></div>
				</div>
							
				
				<button class="btn btn-primary btn-lg btn-block" id="submit"   type="submit">Adicionar Registro</button>
				<i>Debes primero Registrar el Evento para así poder agregar Progamas y/o Entidades</i>
				
				</form>
			</div>
		</div>
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