<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<div class="text-center">
				<img src="../../../Content/logopequeño.png" width="150" class="logo">
			</div>
			<h1 class="display-4 font-weight-bold"><strong>Modificar Colaboradores del Evento</strong></h1>
			<h3>Nombre de la Congreso | <span class="badge badge-info"><?php echo $nombreevento; ?></span></h3>

		</div>
	</div>
	<br><br><br>
</div>
<div class="container">

	<button id="addnew" class="btn btn-dark"><span class="glyphicon glyphicon-plus"></span>Asignar Colaborador</button>
	<div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<span id="alert_message"></span>
	</div>
	<table class="table table-bordered table-striped" style="margin-top:20px;">
		<thead>
			<th>Codigo del Evento</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Acción</th>
		</thead>
		<tbody id="tbody"></tbody>
	</table>

</div>
<div class="container text-center">

	<H3 class="page-header text-center" align="center">Editar Datos, Conferencistas, Programas, Sesiones, Imagenes y/o Entidades del Evento</H3>

	<a class="btn btn-success" href="modificar.php?idevento=<?php echo $row['idevento']; ?>" role="button">DATOS</a>
	<a class="btn btn-success" href="modificar2.php?idevento=<?php echo $row['idevento']; ?>" role="button">PROGRAMAS</a>
	<a class="btn btn-success" href="modificar1.php?idevento=<?php echo $row['idevento']; ?>" role="button">ENTIDADES</a>
	<a class="btn btn-success" href="modificar3.php?idevento=<?php echo $row['idevento']; ?>" role="button">CONFERENCISTAS</a>
	<a class="btn btn-success" href="modificar5.php?idevento=<?php echo $row['idevento']; ?>" role="button">IMAGENES</a>
	<a class="btn btn-success" href="modificar4.php?idevento=<?php echo $row['idevento']; ?>" role="button">SESIONES</a>


	<h1></h1>
	<nav>
		<ul class="pagination">
			<li class="page-item"><a href="index.php" class="page-link">&larr; INICIO</a></li>
		</ul>
	</nav>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php include('../../../Views/public/bootstrap/modal.php'); ?>
<script src="../../../Views/public/js/appusuario.js"></script>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
		$('#usuario').select2({
			placeholder: 'Escoge una'
		});
	});
</script>