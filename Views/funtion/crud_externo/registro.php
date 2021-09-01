<div class="container">

	<form method="POST" name="contactForm" onsubmit="return validateForm()" action="registroe.php">

		<div class="text-center card border-bottom-danger">
			<div class=" text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
				<h1><strong>Tipo de evento: Externo</strong></h1>
				<h4><i><strong>Esta Externo será registrado en la ciudad que actualmente tiene seleccionada.</strong></i></h4>
			</div>
		</div>
		<br><br><br>


		<div class="form-group font-weight-bold"><label for="nombreevento">Nombre del Evento</label><input maxlength="100" minlength="5" type="text" class="form-control" name="nombreevento" id="nombreevento" />
			<div class="error" id="nombreeventoErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="generalinfo">Descripción</label><input maxlength="800" minlength="5" type="text" class="form-control" name="generalinfo" id="generalinfo" />
			<div class="error" id="generalinfoErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="tematica">Tema</label><input type="text" maxlength="100" minlength="5" class="form-control" name="tematica" id="tematica" />
			<div class="error" id="tematicaErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="responsable">Responsable</label><input type="text" maxlength="100" minlength="5" class="form-control" name="responsable" id="responsable" />
			<div class="error" id="responsableErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="audsalon">Lugar</label><input type="text" maxlength="70" minlength="5" class="form-control" name="audsalon" id="audsalon" />
			<div class="error" id="audsalonErr"></div>
		</div>


		<div class="form-group font-weight-bold"><label for="horainicio">Hora de Inicio</label><input type="time" class="form-control" name="horainicio" id="horainicio" required />
			<div class="error" id="horainicioErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="horafin">Hora de Finalización</label><input type="time" class="form-control" name="horafin" id="horafin" required />
			<div class="error" id="horafinErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="fechainicio">Fecha de Inicio</label><input type="date" class="form-control" name="fechainicio" id="fechainicio" />
			<div class="error" id="fechainicioErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="fechafin">Fecha de Finalización</label><input type="date" class="form-control" name="fechafin" id="fechafin" />
			<div class="error" id="fechafinErr"></div>
		</div>


		<button class="btn btn-dark btn-lg btn-block" id="submit" type="submit">Adicionar Registro</button>
	</form>

	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item"><a href="index.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
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