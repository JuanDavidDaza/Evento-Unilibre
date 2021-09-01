<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150">
			<h1 class="display-4 font-weight-bold"><strong>Modificar Registro</strong></h1>
			<p>Codigo de la Entidad | <span class="badge badge-info"><?php echo $identidad; ?></span></p>
		</div>
	</div>
	<br><br><br>


	<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nombreentidad" name="nombreentidad" placeholder="Por favor escribe el nombre de la Entidad" value="<?php echo $row['nombreentidad']; ?>" required>
			</div>
			<input type="hidden" class="form-control" id="nombreentidad1" name="nombreentidad1" placeholder="Por favor escribe la URL" value="<?php echo $row['nombreentidad']; ?>" required>
		</div>
		<div class="form-group font-weight-bold">
			<label for="nombre" class="col-sm-2 control-label">URL</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="url" name="url" placeholder="url" value="<?php echo $row['url']; ?>">
				<i>Si la entidad no tiene URL se pondra por defecto esta https://www.unilibrecali.edu.co</i>
			</div>
		</div>

		<input type="hidden" id="identidad" name="identidad" value="<?php echo $row['identidad']; ?>" />
		<div class="form-group font-weight-bold">
			<label for="idciudad">Ciudad</label id="idciudad"><?php echo $cboidciudad; ?>
		</div>


		<div class="form-group font-weight-bold">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-dark btn-block">Guardar</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj
<script type=" text/javascript">
	$(document).ready(function() {
		$('#idciudad').select2({
			placeholder: 'Escoge una'
		});
	});
</script>