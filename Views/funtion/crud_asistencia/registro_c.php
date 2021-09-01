<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<?php if (empty($idasistente_err)) { ?>
				<h3 class="display-4 font-weight-bold">SE REGISTRO CORRECTAMENTE A ESTE EVENTO</h3>
			<?php } else { ?>
				<h3 class="display-4 font-weight-bold">NO PUEDES REGISTRARTE A ESTE EVENTO </h3>
			<?php } ?>
		</div>
		<div class="text-center">
			<a href="index.php" class="btn btn-dark">Regresar</a>

		</div>
	</div>
</div>