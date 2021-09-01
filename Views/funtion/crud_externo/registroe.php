
<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong><?php echo $imprimir; ?></strong></h1>
		</div>
		<div class="text-center">

			<?php if ($imprimir = "REGISTRO EXITOSO DE EVENTO") { ?>
				<a class="btn btn-dark" href="index.php" role="button">INICIO</a>
			
			<?php } else { ?>
				<a class="btn btn-dark" href="index.php" role="button">INICIO</a>
			<?php } ?>

		</div>
	</div>
</div>