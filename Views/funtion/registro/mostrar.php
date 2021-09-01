<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class=" text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<h2 class="display-4 font-weight-bold"><strong>Control de Página de Registro</strong></h2>
			<h3 class="display-3"><?php echo $registro; ?></h3>


		</div>
	</div>
	<br><br><br>
	<div id="myRadioGroup" class="jumbotron">

		<div class="text-center">
			<h2 class="display-3">Por favor selecciona la acción que quieres realizar</h2>
			Reemplazar por una Institución o Entidad existente<input type="radio" name="cars" checked="checked" value="twoCarDiv" />

			Crear una Nueva Institución o Entidad y Reemplazar <input type="radio" name="cars" value="threeCarDiv"> </input>
		</div>

		<br>
		<br>


		<div id="twoCarDiv" class="desc">
			<form id="existente" method="post" action="edicion.php">
				<div class="form-group font-weight-bold">
					<label>Institución o Entidad</label>
					<select name="idinstitucion" id="idinstitucion" class="item_unit"><?php echo institucion_educativap($connect, $idciudad); ?></select>
					<input type="number" name="tipo" id="tipo" hidden value="1">
					<input type="text" name="registro" id="registro" hidden value="<?php echo $registro; ?>">
					<input type="text" name="cont" id="cont" hidden value="<?php echo $cont; ?>">
					<?php
					for ($i = 0; $i < $cont; $i++) {
						echo '<input type="hidden" name="datoid[]" value="' . $datosid[$i] . '">';
						echo '<input type="hidden" name="datoeve[]" value="' . $datoseve[$i] . '">';
						echo '<input type="hidden" name="datociudad[]" value="' . $datosciudad[$i] . '">';
					}
					?>

					<button class="btn btn-dark" id="submit" type="submit">Registrar</button>

				</div>
			</form>
		</div>
		<div id="threeCarDiv" class="desc">
			<form id="existente" method="post" action="edicion.php">
				<div class="form-group font-weight-bold"><label for="nombre">Nombre</label><input type="text" class="form-control" maxlength="100" required name="nombre" id="nombre" />
				</div>
				<div class="form-group font-weight-bold"><label for="telefono">Telefono</label><input type="number" maxlength="10" class="form-control" required name="telefono" id="telefono" />
				</div>
				<div class="form-group font-weight-bold"><label for="direccion">Dirección</label><input type="text" maxlength="100" class="form-control" required name="direccion" id="direccion" />
				</div>
				<input type="text" name="idciudad" id="idciudad" hidden value="<?php echo $idciudad; ?>">
				<input type="number" name="tipo" id="tipo" hidden value="2">
				<input type="text" name="registro" id="registro" hidden value="<?php echo $registro; ?>">
				<input type="text" name="cont" id="cont" hidden value="<?php echo $cont; ?>">
				<?php
				for ($i = 0; $i < $cont; $i++) {
					echo '<input type="hidden" name="datoid[]" value="' . $datosid[$i] . '">';
					echo '<input type="hidden" name="datoeve[]" value="' . $datoseve[$i] . '">';
					echo '<input type="hidden" name="datociudad[]" value="' . $datosciudad[$i] . '">';
				}
				?>

				<button class="btn btn-dark" id="submit" type="submit">Adicionar y Cambiar Institución de los Asistentes</button>
			</form>
		</div>
	</div>

	<div class="table table-responsive">
		<table id="example" class="table table-striped text-center">
			<thead>
				<tr>
					<th>Numero de Identificación</th>
					<th>ID Evento</th>
					<th>Nombre del Evento</th>
					<th>Registro</th>
					<th>Ciudad</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['idasistente']; ?></td>
						<td><?php echo $row['idevento']; ?></td>
						<td><?php echo $row['nombreevento']; ?></td>
						<td><?php echo $row['registro']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class=" mt-3">
		<div class="col">
			<nav>
				<ul class="pagination">
					<li class="page-item "><a href="index.php" class="page-link">&larr; Regresar</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#idinstitucion').select2({
			placeholder: 'Escoge una'
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("div.desc").hide();
		$("input[name$='cars']").click(function() {
			var test = $(this).val();
			$("div.desc").hide();
			$("#" + test).show();
		});
	});
</script>