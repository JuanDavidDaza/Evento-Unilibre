
<html lang="es">
	<head>
<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>

	</head>
	
	<body>
		<div class="container">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150"> 
						<h1><strong>Modificar Registro</strong></h1>
						<p>USUARIO | <span class="label label-info"><?php echo $row['usuario']; ?></span></p>
					</div>
				</div>

			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="usuario" class="col-sm-2 control-label">USUARIO</label>
						<input type="text" class="form-control" id="usuario" name="usuario" maxlength="80" minlength="5"  placeholder="Nombre" value="<?php echo $row['usuario']; ?>" required>
				</div>	

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">CORREO</label>
						<input type="text" class="form-control" id="email" name="email" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['email']; ?>" required>
				</div>		
				<input type="text" class="form-control" hidden id="email2" name="email2" maxlength="100" minlength="5" placeholder="Nombre" value="<?php echo $row['email']; ?>" required>

				<?php  if($id1==1){ ?>
						<div class='form-group'>
							<label for='rol_id' class='col-sm-2 control-label'>TIPO DE ROL</label>
								<select class='form-control' id='rol_id' name='rol_id'>
									<option value='1' <?php if($row['rol_id']=='1') echo 'selected'; ?>>Administrador</option>
									<option value='4' <?php if($row['rol_id']=='4') echo 'selected'; ?>>Administrador de Eventos</option>
									<option value='2' <?php if($row['rol_id']=='2') echo 'selected'; ?>>Colaborador</option>
									<option value='3' <?php if($row['rol_id']=='3') echo 'selected'; ?>>Sin Ningun Permiso</option>
								</select>
						</div>

				<?php  } else{ ?>

						<div class='form-group'>
							<label for='rol_id' class='col-sm-2 control-label'>TIPO DE ROL</label>
								<select class='form-control' id='rol_id' name='rol_id'>
									<option value='2' <?php if($row['rol_id']=='2') echo 'selected'; ?>>Colaborador</option>
									<option value='3' <?php if($row['rol_id']=='3') echo 'selected'; ?>>Sin Ningun Permiso</option>
								</select>
						</div>

				<?php  } ?>

				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />

				<div class="form-group">
					    <label>Ingrese Contraseña</label>
					        <div class="input-group">
					      		<input id="password" name="password" type="Password" Class="form-control" required value="<?php echo $clave; ?>">
					      		<div class="input-group-append">
					            	<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button></div>
					    </div>
	
				</div>

				<div class="form-group">
					<label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
				</div>

				<div class="form-group col-md-12">
					 <label for=""><strong>Foto</strong> </label>
					 <br>
					 <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../../../Content/user/<?php echo $row['foto']; //user.png?>" />
					 <br/>
					 <br/>
					 <input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto">
					 <br> 
				</div> 

				
					<div class="col-sm-offset-2">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
					</div>
			</form>
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
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
</html>
<script type="text/javascript">
$(document).ready(function(){
        $('#idciudad').select2({placeholder: 'Escoge una' });
});
function mostrarPassword(){
		var cambio = document.getElementById("password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
} 
</script>
