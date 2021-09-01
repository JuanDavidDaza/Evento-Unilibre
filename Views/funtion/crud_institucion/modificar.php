<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150">
			<h1 class="display-4 font-weight-bold"><strong>Modificar Registro</strong></h1>
			<p>Codigo de la Institución Educativa | <span class="label label-info"><?php echo $idinstitucion; ?></span></p>
		</div>
	</div>
	<br><br><br>


	<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required maxlength="150" />
			</div>
		</div>
		<div class="form-group font-weight-bold">
			<label for="telefono" class="col-sm-2 control-label">Telefono</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="telefono" maxlength="10" name="telefono" placeholder="telefono" value="<?php echo $row['telefono']; ?>" required />
			</div>
		</div>
		<input type="" hidden value="<?php echo $row['nombre']; ?>" name="nombre1">
		<div class="form-group font-weight-bold">
			<label for="direccion" class="col-sm-2 control-label">Dirección</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="<?php echo $row['direccion']; ?>" required maxlength="200" />
			</div>
		</div>


		<div class="form-group font-weight-bold">
			<label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
		</div>

		<input type="hidden" id="idinstitucion" name="idinstitucion" value="<?php echo $row['idinstitucion']; ?>" />


		<div class="form-group font-weight-bold">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-dark btn-lg btn-block">Guardar</button>
			</div>
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