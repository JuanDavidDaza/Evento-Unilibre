<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="container text-center">
			<img src="../../../Content/logopequeño.png" width="150">
			<h1 class="display-4 font-weight-bold"><strong>Modificar Registro</strong></h1>
			<p>USUARIO | <span class="badge badge-info"><?php echo $row['usuario']; ?></span></p>
		</div>
	</div>
	<br><br><br>


	<form class="form-horizontal" method="POST" action="update.php" autocomplete="off" enctype="multipart/form-data">
		<div class="form-group font-weight-bold">
			<label for="usuario" class="col-sm-2 control-label">USUARIO</label>
			<input type="text" class="form-control" id="usuario" name="usuario" maxlength="80" minlength="5" placeholder="Nombre" value="<?php echo $row['usuario']; ?>" required>
		</div>

		<div class="form-group font-weight-bold">
			<label for="email" class="col-sm-2 control-label">CORREO</label>
			<input type="text" class="form-control" id="email" name="email" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['email']; ?>" required>
		</div>
		<input type="text" class="form-control" hidden id="email2" name="email2" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['email']; ?>" required>

		<?php if ($id1 == 1) { ?>
			<div class='form-group font-weight-bold'>
				<label for='rol_id' class='col-sm-2 control-label'>TIPO DE ROL</label>
				<select class='form-control' id='rol_id' name='rol_id'>
					<option value='1' <?php if ($row['rol_id'] == '1') echo 'selected'; ?>>Administrador</option>
					<option value='4' <?php if ($row['rol_id'] == '4') echo 'selected'; ?>>Administrador de Eventos</option>
					<option value='2' <?php if ($row['rol_id'] == '2') echo 'selected'; ?>>Colaborador</option>
					<option value='3' <?php if ($row['rol_id'] == '3') echo 'selected'; ?>>Sin Ningun Permiso</option>
				</select>
			</div>

		<?php  } else { ?>

			<div class='form-group font-weight-bold'>
				<label for='rol_id' class='col-sm-2 control-label'>TIPO DE ROL</label>
				<select class='form-control' id='rol_id' name='rol_id'>
					<option value='2' <?php if ($row['rol_id'] == '2') echo 'selected'; ?>>Colaborador</option>
					<option value='3' <?php if ($row['rol_id'] == '3') echo 'selected'; ?>>Sin Ningun Permiso</option>
				</select>
			</div>

		<?php  } ?>

		<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />

		<div class="form-group font-weight-bold">
			<label>Ingrese Contraseña</label>
			<div class="input-group font-weight-bold">
				<input id="password" name="password" type="Password" Class="form-control" required value="<?php echo $clave; ?>">
				<div class="input-group font-weight-bold-append">
					<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
				</div>
			</div>

		</div>

		<div class="form-group font-weight-bold">
			<label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
		</div>

		<div class="form-group font-weight-bold col-md-12">
			<label for=""><strong>Foto</strong> </label>
			<br>
			<img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../../../Content/user/<?php echo $row['foto']; //user.png
																										?>" />
			<br />
			<br />
			<input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto">
			<br>
		</div>


		<div class="col-sm-offset-2">
			<button type="submit" class="btn btn-dark btn-lg btn-block">Guardar</button>
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