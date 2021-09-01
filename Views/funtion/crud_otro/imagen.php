<script src="../../../Views/public/js/registro_conferencista.js"></script>


<div class="container">


	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong>Adicionar Imagen</strong></h1>
		</div>
	</div>
	<br><br><br>
	<?php if (isset($errMSG)) { ?>
		<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong> </div>
	<?php	} else if (isset($successMSG)) { ?>
		<div class="alert alert-success"> <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong> </div>
	<?php	} ?>
	<form method="post" enctype="multipart/form-data">



		<input type="hidden" id="accion" name="accion" value="btnAgregar" />
		<input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento; ?>" />

		<div class="form-group"><label for="nombre">Nombre</label><input type="text" maxlength="100" minlength="8" class="form-control" required name="nombre" id="nombre" />
		</div>

		<div class="form-group"><label for="detalles">Detalles</label><input type="text" maxlength="150" minlength="8" class="form-control" required name="detalles" id="detalles" />
		</div>


		<div class=" form-group"><label for="tipo">Tipo</label>
			<select name="tipo" class="form-control">
				<!-- Opciones de la lista -->
				<option value="Principal">Principal</option>
				<option value="Otro" selected>Otro</option> <!-- Opción por defecto -->
			</select>
		</div>

		<div class="form-group"><label for="imagen">Foto</label>
			<input type="file" class="form-control" accept="image/*" name="imagen" required placeholder="" id="imagen">
		</div>

		<button type="submit" name="btnsave" class="btn btn-dark btn-lg btn-block"> <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar Imagen </button>
	</form>

	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item"><a href="<?php echo $enlace; ?>" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>