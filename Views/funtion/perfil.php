<div class="container">
	<h1 class="h3 mb-4 text-gray-800">Mi Perfil</h1>

	<div class="card shadow">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary">Editar Información</h6>
		</div>
		<div class="card-body">

			<div class="jumbotron">
				<div class="container text-center">
					<img class="img-thumbnail rounded mx-auto d-block" src="../../Content/user/<?php echo $row['foto']; ?>" width="150">
					<h4>Nombre de Usuario | <span class="badge badge-danger"><strong><?php echo $row['usuario']; ?></strong></span></h4>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Datos personales
				</div>
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="update.php" autocomplete="off" enctype="multipart/form-data">
						<div class="form-group">
							<label for="usuario" class="col-sm-2 control-label"><strong>Usuario</strong></label>
							<input type="text" class="form-control" id="usuario" name="usuario" maxlength="80" minlength="5" placeholder="Nombre" value="<?php echo $row['usuario']; ?>" required>
						</div>

						<div class="form-group">
							<label for="email" class="col-sm-2 control-label"><strong>Correo</strong></label>
							<input type="text" class="form-control" id="email" name="email" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['email']; ?>" required>
						</div>
						<input type="text" class="form-control" hidden id="email2" name="email2" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['email']; ?>" required>

						<?php if ($id1 == 1) { ?>
							<div class='form-group'>
								<label for='rol_id' class='col-sm-2 control-label'><strong>Tipo de Rol</strong></label>
								<select class='form-control' id='rol_id' name='rol_id'>
									<option value='1' <?php if ($row['rol_id'] == '1') echo 'selected'; ?>>Administrador</option>
									<option value='4' <?php if ($row['rol_id'] == '4') echo 'selected'; ?>>Administrador de Eventos</option>
									<option value='2' <?php if ($row['rol_id'] == '2') echo 'selected'; ?>>Colaborador</option>
									<option value='3' <?php if ($row['rol_id'] == '3') echo 'selected'; ?>>Sin Ningun Permiso</option>
								</select>
							</div>



						<?php   } else { ?>
							<div class='form-group'>
								<label for=""><strong>Tipo de Rol: </strong><span class="badge badge-info"> <?php echo $nombre_rol; ?></span></label>
								<input type="hidden" id="rol_id" name="rol_id" value="<?php echo $row['rol_id']; ?>" />

							</div>
						<?php  } ?>


						<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />

						<div class="form-group">
							<label><strong>Contraseña</strong></label>
							<div class="input-group">
								<input id="password" name="password" type="Password" Class="form-control" required value="<?php echo $clave; ?>">
								<div class="input-group-append">
									<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
								</div>
							</div>

						</div>

						<?php if ($id1 == 1) { ?>
							<div class='form-group'>
								<label for="idciudad"><strong>Ciudad</strong></label id="idciudad"><?php echo $cboidciudad; ?>
							</div>



						<?php   } else { ?>
							<div class='form-group'>
								<label for="idciudad"><strong>Ciudad: </strong> <span class="badge badge-info"><?php echo $nombreciudadevento; ?></span> </label>
								<input type="hidden" id="idciudad" name="idciudad" value="<?php echo $row['idciudad']; ?>" />
							</div>
						<?php  } ?>


						<div class="form-group col-md-12">
							<label for=""><strong>Foto</strong> </label>
							<br>
							<img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../../Content/user/<?php echo $row['foto']; //user.png
																														?>" />
							<br />
							<br />
							<input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto">
							<br>
						</div>




						<div class="col-sm-offset-2">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar cambios</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>



</div>




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