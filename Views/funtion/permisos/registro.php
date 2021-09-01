<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150">
			<h1 class="display-4 font-weight-bold"><strong>Registro de Usuario</strong></h1>
		</div>
	</div>
	<br><br><br>


	<form class="container" method="POST" action="registroe.php" autocomplete="off" enctype="multipart/form-data">
		<div class="form-group font-weight-bold">
			<label for="usuario" class="col-sm-2 control-label">USUARIO</label>
			<div class="container">
				<input type="text" class="form-control" id="usuario" name="usuario" maxlength="80" minlength="5" required>
			</div>
		</div>

		<div class="form-group font-weight-bold">
			<label for="email" class="col-sm-2 control-label">CORREO</label>
			<div class="container">
				<input type="email" class="form-control" id="email" name="email" maxlength="100" minlength="5" required>
			</div>
		</div>

		<?php echo $opt; ?>

		<div class="form-group font-weight-bold">
			<label>Ingrese Contraseña</label>
			<div class="input-group font-weight-bold">
				<input id="password" name="password" maxlength="16" type="Password" Class="form-control" required value="<?php echo $password; ?>">
				<div class="input-group font-weight-bold-append">
					<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
				</div>
			</div>

		</div>

		<div class="form-group font-weight-bold"><label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?></div>

		<div class="form-group font-weight-bold"><label for="txtFoto">Foto</label>
			<input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto">
		</div>

		<div class="col-sm-offset-2 container">
			<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
		</div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#idciudad').select2({
			placeholder: 'Escoge una'
		});
	});

	function mostrarPassword() {
		var cambio = document.getElementById("password");
		if (cambio.type == "password") {
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		} else {
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
</script>