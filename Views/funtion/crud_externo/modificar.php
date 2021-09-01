<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150">
			<h1 class="display-4 font-weight-bold"><strong>Modificar Registro del Evento</strong></h1>
			<p>Codigo del Evento | <span class="badge badge-info"><?php echo $idevento; ?></span></p>
		</div>
	</div>
	<br><br><br>


	<form class="form-horizontal" onsubmit="return validateForm()" name="contactForm" method="POST" action="update.php" autocomplete="off">
		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" id="nombreevento" name="nombreevento" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['nombreevento']; ?>">
				<div class="error" id="nombreeventoErr"></div>
			</div>
		</div>


		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Descripción</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" id="generalinfo" name="generalinfo" maxlength="800" minlength="5" placeholder="Nombre" value="<?php echo $row['generalinfo']; ?>">
				<div class="error" id="generalinfoErr"></div>
			</div>
		</div>

		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Responsable</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" id="responsable" name="responsable" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['responsable']; ?>">
				<div class="error" id="responsableErr"></div>
			</div>
		</div>


		<div class="form-group font-weight-bold">
			<label for="estado" class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-12">
				<select class="form-control" id="estado" name="estado">
					<option value="Activo" <?php if ($row['estado'] == 'Activo') echo 'selected'; ?>>Activo</option>
					<option value="Cerrado" <?php if ($row['estado'] == 'Cerrado') echo 'selected'; ?>>Cerrado</option>
				</select>
			</div>
		</div>


		<input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />


		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Lugar</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" id="audsalon" name="audsalon" placeholder="Nombre" maxlength="50" minlength="5" value="<?php echo $row1['audsalon']; ?>">
				<div class="error" id="audsalonErr"></div>
			</div>
		</div>
		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Hora de Inicio</label>
			<div class="col-sm-12">
				<input type="time" class="form-control" id="horainicio" name="horainicio" required placeholder="Nombre" value="<?php echo $row1['horainicio']; ?>">
				<div class="error" id="horainicioErr"></div>
			</div>
		</div>
		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Hora de Finalización</label>
			<div class="col-sm-12">
				<input type="time" class="form-control" id="horafin" name="horafin" required placeholder="Nombre" value="<?php echo $row1['horafin']; ?>">
				<div class="error" id="horafinErr"></div>
			</div>
		</div>

		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Fecha de Inicio</label>
			<div class="col-sm-12">
				<input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="Nombre" value="<?php echo $row1['fechainicio']; ?>">
				<div class="error" id="fechainicioErr"></div>
			</div>
		</div>

		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Fecha de Finalización</label>
			<div class="col-sm-12">
				<input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Nombre" value="<?php echo $row1['fechafin']; ?>">
			</div>
		</div>

		<div class="form-group font-weight-bold">
			<label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
		</div>

		<div class="form-group font-weight-bold">
			<div class="col-sm-offset-2 col-sm-12">
				<button type="submit" class="btn btn-dark btn-lg btn-block">Guardar</button>
			</div>
		</div>
	</form>
</div>

<div class="container text-center">
	<div class="container text-center">
		<div class="col-sm-offset-2 col-sm-12">
			<H3 class="page-header text-center" align="center">Editar Programas, Imagenes y/o Entidades que están relacionadas con el Evento</H3>

			<a class="btn btn-success" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
			<a class="btn btn-success" href="modificar5.php?idevento=<?php echo $row['idevento']; ?>" role="button">IMAGENES</a>
			<a class="btn btn-success" href="modificar2.php?idevento=<?php echo $row['idevento']; ?>" role="button">PROGRAMAS</a>
			<h1></h1>
		</div>
	</div>
	<div class="col-sm-offset-2 col-sm-12">

		<ul class="pagination">
			<li class="page-item"><a href="index.php" class="page-link">&larr; Regresar</a></li>
		</ul>

	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#idciudad').select2({
				placeholder: 'Escoge una'
			});
		});
	</script>