<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<?php if ($resultado) { ?>
				<h1 class="display-4 font-weight-bold"><strong>REGISTRO MODIFICADO</strong></h1>
			<?php } else { ?>
				<h1 class="display-4 font-weight-bold"><strong>ERROR AL MODIFICAR</strong></h1>
			<?php } ?>
		</div>
		<div class="text-center">
			<a href="sesion.php?idevento=<?php echo $row['idevento']; ?>" class="btn btn-dark">Regresar</a>

		</div>
	</div>
</div>