<div class="container">

	<form method="post" action="registro-code.php">

		<div class="text-center card border-bottom-danger">
			<div class=" text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
				<h1 class="display-4 font-weight-bold"><strong>Adicionar Entidad</strong></h1>
				<strong><i>Se registrará esta Entidad en la Ciudad "<?php echo $nombreciudad;  ?>"</i></strong>
			</div>
		</div>
		<br><br><br>
		<div class="form-group font-weight-bold"><label for="nombreentidad">Nombre de la Entidad</label><input type="text" class="form-control" maxlength="50" minlength="5" required name="nombreentidad" id="nombreentidad" />
		</div>
		<div class="form-group font-weight-bold">
			<label for="url">URL</label><input type="url" class="form-control" maxlength="50" name="url" id="url" />
			<i>Por favor ingrese una URL y si la entidad no tiene se pondra por defecto esta https://www.unilibrecali.edu.co</i>
		</div>

		<button class="btn btn-dark" id="submit" type="submit">Adicionar Entidad</button>
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