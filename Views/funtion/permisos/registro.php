
<html lang="es">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
						<h1><strong>Registro de Usuario</strong></h1>
					</div>
				</div>

			
			<form class="container" method="POST" action="registroe.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="usuario" class="col-sm-2 control-label">USUARIO</label>
					<div class="container">
						<input type="text" class="form-control" id="usuario" name="usuario" maxlength="80" minlength="5"  required>
					</div>
				</div>	

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">CORREO</label>
					<div class="container">
						<input type="email" class="form-control" id="email" name="email" maxlength="100" minlength="5"   required>
					</div>
				</div>		

				<?php echo $opt; ?>
				
				<div class="form-group">
					    <label>Ingrese Contraseña</label>
					        <div class="input-group">
					      		<input id="password" name="password" maxlength="16" type="Password" Class="form-control" required value="<?php echo $password; ?>">
					      		<div class="input-group-append">
					            	<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button></div>
					    </div>
	
				</div>

				<div class="form-group"><label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?></div>

					<div class="form-group"><label for="txtFoto">Foto</label>
		         	<input type="file" class="form-control" accept="image/*" name="txtFoto"  placeholder="" id="txtFoto">
          		</div>
				
					<div class="col-sm-offset-2 container">
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


