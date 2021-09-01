<style type="text/css">
	.error {
		color: red;
		font-size: 90%;
	}
</style>
<script src="../../../Views/public/js/registro_conferencista.js"></script>
<div class="container">
	

			<div class="text-center card border-bottom-danger">
				<div class="container text-center">
					<img src="../../../Content/logopequeño.png" width="150" class="logo">
					<h1 class="display-4 font-weight-bold"><strong>Adicionar Conferencista</strong></h1>
				</div>
				<br>
				<br>
			</div>
			<form name="contactForm" method="post" onsubmit="return validateForm()" action="registro-code.php" enctype="multipart/form-data">
				<label class="error">* Obligatorio</label>
				<div class="form-group"><label for="cedula">Numero de Identificación</label><strong><label class="error">*</label></strong><input type="number" maxlength="10" minlength="6" class="form-control" name="cedula" id="cedula" />
					<div class="error" id="cedulaErr"></div>
				</div>

				<div class="form-group"><label for="nombre">Nombre y Apellido Completo</label><strong><label class="error">*</label></strong><input type="text" maxlength="70" minlength="8" class="form-control" name="nombre" id="nombre" />
					<div class="error" id="nombreErr"></div>
				</div>


				<div class="form-group"><label for="celular1">Numero de Contacto 1</label><strong><label class="error">*</label></strong><input type="number" maxlength="10" class="form-control" name="celular1" id="celular1" />
					<div class="error" id="celular1Err"></div>
				</div>

				<div class="form-group"><label for="celular2">Numero de Contacto 2</label><input type="number" maxlength="10" class="form-control" name="celular2" id="celular2" />
					<div class="error" id="celular2Err"></div>
				</div>

				<div class="form-group"><label for="correo">Correo</label><strong><label class="error">*</label></strong><input type="email" class="form-control" maxlength="50" name="correo" id="correo" />
					<div class="error" id="correoErr"></div>
				</div>

				<div class="form-group"><label for="perfil">Perfil</label><strong><label class="error">*</label></strong><input class="form-control" type="text" name="perfil" maxlength="400" minlength="10"></input>
					<div class="error" id="perfilErr"></div>
				</div>

				<div class="form-group"><label for="linkedin">Linkedin</label><input type="email" class="form-control" maxlength="50" name="linkedin" id="linkedin" />
					<div class="error" id="linkedinErr"></div>
				</div>

				<div class="form-group"><label for="pais">País</label><strong><label class="error">*</label></strong><input type="text" class="form-control" name="pais" id="pais" />
					<div class="error" id="paisErr"></div>
				</div>

				<div class="form-group"><label for="txtFoto">Foto</label>
					<input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto">
				</div>


				<button class="btn btn-primary btn-lg btn-block" id="submit" type="submit">Adicionar registro</button>
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