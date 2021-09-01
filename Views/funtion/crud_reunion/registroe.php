
<div class="container">
	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h1 class="display-4 font-weight-bold"><strong><?php echo $imprimir; ?></strong></h1>
		</div>
		<div class="text-center">

			<?php if ($imprimir = "REGISTRO EXITOSO") { ?>

				<h3 class="page-header text-center">A continuación, podrá vincular Programas y/o Entidades a su evento,<h4 class="color"><strong><i>Clic en Siguiente para continuar</i></strong></h4>
				</h3>
				<a class="btn btn-dark" href="registro1.php?idevento=<?php echo $idevento_1; ?>" role="button">SIGUIENTE</a>
				<h1></h1>
			<?php } else { ?>
				<a class="btn btn-dark" href="index.php" role="button">INICIO</a>
			<?php } ?>

		</div>
	</div>
</div>