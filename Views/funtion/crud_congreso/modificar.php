<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h2 class="display-4 font-weight-bold"><strong>Modificar Registro</strong></h2>
			<h3 >Codigo del Congreso | <span class="badge badge-info"><?php echo $idevento; ?></span></h3>

		</div>
	</div>
<br><br><br>

	<form class="form-horizontal" name="contactForm" onsubmit="return validateForm()" method="POST" action="update.php" autocomplete="off">
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
			<label for="nombre" class="col-sm-2 control-label">Tema</label>
			<div class="col-sm-12">
				<input type="text" class="form-control" id="tematica" name="tematica" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['tematica']; ?>">
				<div class="error" id="tematicaErr"></div>
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
			<label for="idciudad">Ciudad</label><?php echo $cboidciudad; ?>
		</div>
		<div class="form-group font-weight-bold">
			<div class="col-sm-offset-2 col-sm-12">

				<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
			</div>
		</div>
	</form>
</div>

<div class="container text-center jumbotron">

	<h4 class="text-center font-weight-bold">Editar Entidades, Sesiones, Colaboradores, Conferencistas, Imagenes y/o Programas que están relacionadas con el Evento</h4><br>

	<a class="btn btn-dark" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
	<a class="btn btn-dark" href="modificar2.php?idevento=<?php echo $row['idevento']; ?>" role="button">PROGRAMAS</a>
	<a class="btn btn-dark" href="modificar3.php?idevento=<?php echo $row['idevento']; ?>" role="button">CONFERENCISTAS</a>
	<a class="btn btn-dark" href="modificar4.php?idevento=<?php echo $row['idevento']; ?>" role="button">SESIONES</a>
	<a class="btn btn-dark" href="modificar5.php?idevento=<?php echo $row['idevento']; ?>" role="button">IMAGENES</a>
	<a class="btn btn-dark" href="modificar6.php?idevento=<?php echo $row['idevento']; ?>" role="button">COLABORADOR</a>
	<br>
	<br>
	<a href="index.php" class="page-link">&larr; Regresar</a>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../../../Views/public/js/validar2.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#idciudad').select2({
			placeholder: 'Escoge una'
		});
	});
</script>