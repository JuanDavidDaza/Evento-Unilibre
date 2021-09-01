<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h2 class="display-4 font-weight-bold"><strong>Modificar Registro</strong></h2>
			<p >Codigo de la Conferencia | <span class="badge badge-info"><?php echo $idevento; ?></span></p>
		</div>
	</div>
	<br>
	<br>
	<br>
	<form class="form-horizontal" onsubmit="return validateForm()" name="contactForm" method="POST" action="update.php" autocomplete="off">
		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Nombre</label>

			<input type="text" class="form-control" id="nombreevento" name="nombreevento" maxlength="100" minlength="5" value="<?php echo $row['nombreevento']; ?>">
			<div class="error" id="nombreeventoErr"></div>

		</div>


		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Descripción</label>

			<input type="text" class="form-control" id="generalinfo" name="generalinfo" maxlength="800" minlength="5" value="<?php echo $row['generalinfo']; ?>">
			<div class="error" id="generalinfoErr"></div>

		</div>

		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Tema</label>

			<input type="text" class="form-control" id="tematica" name="tematica" maxlength="100" minlength="5" value="<?php echo $row['tematica']; ?>">
			<div class="error" id="tematicaErr"></div>

		</div>

		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Responsable</label>

			<input type="text" class="form-control" id="responsable" name="responsable" maxlength="100" minlength="5" value="<?php echo $row['responsable']; ?>">
			<div class="error" id="responsableErr"></div>

		</div>
		<div class="form-group">
			<label for="estado" class="col-sm-2 font-weight-bold">Estado</label>

			<select class="form-control" id="estado" name="estado">
				<option value="Activo" <?php if ($row['estado'] == 'Activo') echo 'selected'; ?>>Activo</option>
				<option value="Cerrado" <?php if ($row['estado'] == 'Cerrado') echo 'selected'; ?>>Cerrado</option>
			</select>

		</div>
		<input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Lugar</label>

			<input type="text" class="form-control" id="audsalon" name="audsalon" maxlength="70" minlength="5" value="<?php echo $row1['audsalon']; ?>">
			<div class="error" id="audsalonErr"></div>

		</div>
		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Hora de Inicio</label>

			<input type="time" class="form-control" id="horainicio" name="horainicio" value="<?php echo $row1['horainicio']; ?>">
			<div class="error" id="horainicioErr"></div>

		</div>
		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Hora de Finalización</label>

			<input type="time" class="form-control" id="horafin" name="horafin" value="<?php echo $row1['horafin']; ?>">
			<div class="error" id="horafinErr"></div>

		</div>

		<div class="form-group">
			<label for="nombre" class="col-sm-2 font-weight-bold">Fecha de Inicio</label>

			<input type="date" class="form-control" id="fechainicio" name="fechainicio" value="<?php echo $row1['fechainicio']; ?>">
			<div class="error" id="fechainicioErr"></div>

		</div>

		<div class="form-group">
			<label for="idciudad" class="font-weight-bold">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
		</div>

		<div class="form-group">

			<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>

		</div>
	</form>
</div>

<div class="container text-center jumbotron">

	<h4 class="text-center font-weight-bold">Editar Programas, Imagenes, Conferencistas, Colaboradores y/o Entidades que están relacionadas con el Evento</h4><br>

	<a class="btn btn-dark" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
	<a class="btn btn-dark" href="modificar2.php?idevento=<?php echo $row['idevento']; ?>" role="button">PROGRAMAS</a>
	<a class="btn btn-dark" href="modificar3.php?idevento=<?php echo $row['idevento']; ?>" role="button">CONFERENCISTAS</a>
	<a class="btn btn-dark" href="modificar5.php?idevento=<?php echo $row['idevento']; ?>" role="button">IMAGENES</a>
	<a class="btn btn-dark" href="modificar6.php?idevento=<?php echo $row['idevento']; ?>" role="button">COLABORADOR</a>
	<br>
	<br>
	<a href="index.php" class="page-link">&larr; Regresar</a>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../../../Views/public/js/validar_rc.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#idciudad').select2({
			placeholder: 'Escoge una'
		});
	});
</script>