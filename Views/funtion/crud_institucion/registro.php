<div class="container">

	<form method="post" action="registro-code.php">

		<div class="text-center card border-bottom-danger">
			<div class=" text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
				<h1 class="display-4 font-weight-bold"><strong>Adicionar Institución o Entidad</strong></h1>
				<h3><strong>Por defecto se registrará esta Institución o Entidad en la Ciudad seleccionada</strong></h3>
			</div>
		</div>
		<br><br><br>

		<div class="form-group font-weight-bold"><label for="nombre">Nombre</label><input type="text" class="form-control" required name="nombre" id="nombre" />
		</div>
		<div class="form-group font-weight-bold"><label for="telefono">Telefono</label><input type="number" class="form-control" required name="telefono" id="telefono" />
		</div>
		<div class="form-group font-weight-bold"><label for="direccion">Dirección</label><input type="text" class="form-control" required name="direccion" id="direccion" />
		</div>

		<button class="btn btn-primary" id="submit" type="submit">Adicionar Institución</button>
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