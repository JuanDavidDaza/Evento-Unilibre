<div class="container">

	<form method="POST" name="contactForm" onsubmit="return validateForm()" action="registroe.php">


		<div class="text-center card border-bottom-danger">
			<div class="text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
			</div>
			<h1 class="display-4 font-weight-bold"><strong>Adicionar Congreso</strong></h1>
			<h4><i><strong>Por defecto este Congreso se registrará en Ciudad Seleccionada</strong></i></h4>
		</div>

		<br><br><br>

		<div class="form-group font-weight-bold"><label for="nombreevento">Nombre del Evento</label><input type="text" maxlength="100" minlength="5" class="form-control" name="nombreevento" id="nombreevento" />
			<div class="error" id="nombreeventoErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="generalinfo">Descripción del Evento</label><input type="text" maxlength="800" minlength="5" class="form-control" name="generalinfo" id="generalinfo" />
			<div class="error" id="generalinfoErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="tematica">Tema del Evento</label><input type="text" maxlength="50" minlength="5" class="form-control" name="tematica" id="tematica" />
			<div class="error" id="tematicaErr"></div>
		</div>

		<div class="form-group font-weight-bold"><label for="responsable">Responsable</label><input type="text" maxlength="50" minlength="5" class="form-control" name="responsable" id="responsable" />
			<div class="error" id="responsableErr"></div>
		</div>

		<button class="btn btn-dark btn-lg btn-block" id="submit" type="submit">Adicionar Registro</button>
		<i>Debes primero Registrar el Evento para así poder agregar Progamas, Entidades, Conferencistas y/o Sesiones</i>


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
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../../../Views/public/js/validar2.js"></script>