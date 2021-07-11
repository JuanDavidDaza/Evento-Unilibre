
<!DOCTYPE HTML><html lang="es">
<head><meta charset="UTF-8">

	<title>Adicionar a evento</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<style type="text/css">
		  .error {
    color: red;
    font-size: 90%;
}
	</style>
	<script src="../../../Views/public/js/registro_conferencista.js"></script>
	<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo">
						<h1><strong>Adicionar Conferencista</strong></h1>
					</div>
				</div>
				<form name="contactForm" method="post" onsubmit="return validateForm()" action="registro-code.php" enctype="multipart/form-data">	
   				<label class="error">* Obligatorio</label>
				<div class="form-group"><label for="cedula">Numero de Identificación</label><strong><label class="error">*</label></strong><input type="number" maxlength="10" minlength="6" class="form-control"  name="cedula" id="cedula"/>
					<div class="error" id="cedulaErr"></div>
				</div>

				<div class="form-group"><label for="nombre">Nombre y Apellido Completo</label><strong><label class="error">*</label></strong><input type="text" maxlength="70" minlength="8" class="form-control"  name="nombre" id="nombre"/>
					<div class="error" id="nombreErr"></div>
				</div>

								 
				<div class="form-group"><label for="celular1">Numero de Contacto 1</label><strong><label class="error">*</label></strong><input type="number" maxlength="10" class="form-control"  name="celular1" id="celular1"/>
					<div class="error" id="celular1Err"></div>
				</div>

				<div class="form-group"><label for="celular2">Numero de Contacto 2</label><input type="number" maxlength="10" class="form-control"  name="celular2" id="celular2"/>
					<div class="error" id="celular2Err"></div>
				</div>

				<div class="form-group"><label for="correo">Correo</label><strong><label class="error">*</label></strong><input type="email" class="form-control" maxlength="50"  name="correo" id="correo"/>
					<div class="error" id="correoErr"></div>
				</div>

				<div class="form-group"><label for="perfil">Perfil</label><strong><label class="error">*</label></strong><input class="form-control" type="text" name="perfil" maxlength="400" minlength="10"  ></input>
				<div class="error" id="perfilErr"></div></div>

				<div class="form-group"><label for="linkedin">Linkedin</label><input type="email" class="form-control"  maxlength="50" name="linkedin" id="linkedin"/>
					<div class="error" id="linkedinErr"></div>
				</div>

				<div class="form-group"><label for="pais">País</label><strong><label class="error">*</label></strong><input type="text" class="form-control"  name="pais" id="pais"/>
					<div class="error" id="paisErr"></div>
				</div>

				<div class="form-group"><label for="txtFoto">Foto</label>
		         	<input type="file" class="form-control" accept="image/*" name="txtFoto"  placeholder="" id="txtFoto">
          		</div>


				<button class="btn btn-primary btn-lg btn-block" id="submit" type="submit">Adicionar registro</button>
				</form>
			</div>
		</div>
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
</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

