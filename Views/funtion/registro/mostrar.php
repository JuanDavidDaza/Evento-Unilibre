
<html lang="es">
	<head>
<!--datables CSS básico-->
    	<link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css"/>
    	<!--datables estilo bootstrap 4 CSS-->  
    	<link rel="stylesheet"  type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
		<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
		
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
						<h2 class="display-2"><strong>Control de Página de Registro</strong></h2>
						<h3 class="display-3"><?php echo $registro; ?></h3>

					</div>
				</div>
			</div>
			<div id="myRadioGroup" class="jumbotron">
    
			   <div class="text-center">
			   	<h2 class="display-3">Por favor selecciona la acción que quieres realizar</h2>
			   		 Reemplazar por una Institución o Entidad existente<input type="radio" name="cars" checked="checked" value="twoCarDiv"  />
			    
			    Crear una Nueva Institución o Entidad y Reemplazar <input type="radio" name="cars" value="threeCarDiv" > </input>
			   </div>

			    <br>
			    <br>
			   
			    
			    <div id="twoCarDiv" class="desc">
			        <form  id="existente" method="post" action="edicion.php">
						<div class="form-group">
			    		<label>Institución o Entidad</label>
			    		<select name="idinstitucion" id="idinstitucion" class="item_unit" ><?php echo institucion_educativap($connect,$idciudad); ?></select>	
			    		<input type="number" name="tipo" id="tipo" hidden value="1">
			    		<input type="text" name="registro" id="registro" hidden  value="<?php echo $registro; ?>">
			    		<input type="text" name="cont" id="cont" hidden  value="<?php echo $cont; ?>">
			    		<?php 
							for ($i=0; $i <$cont ; $i++) 
						{
					     echo '<input type="hidden" name="datoid[]" value="'. $datosid[$i]. '">';
						 echo '<input type="hidden" name="datoeve[]" value="'. $datoseve[$i]. '">';
						 echo '<input type="hidden" name="datociudad[]" value="'. $datosciudad[$i]. '">';
						}					
					 ?>
	
			    		<button class="btn btn-primary" id="submit" type="submit">Registrar</button>
		
			    		</div>
					</form>	
			    </div>
			    <div id="threeCarDiv" class="desc">
			        <form  id="existente" method="post" action="edicion.php">
					<div class="form-group"><label for="nombre">Nombre</label><input type="text" class="form-control" maxlength="100" required name="nombre" id="nombre"/>
					</div>
					<div class="form-group"><label for="telefono">Telefono</label><input type="number" maxlength="10" class="form-control" required name="telefono" id="telefono"/>
					</div>
					<div class="form-group"><label for="direccion">Dirección</label><input type="text" maxlength="100" class="form-control" required name="direccion" id="direccion"/>
					</div>
					<input type="text" name="idciudad" id="idciudad" hidden  value="<?php echo $idciudad; ?>">
					<input type="number" name="tipo" id="tipo" hidden value="2">
					<input type="text" name="registro" id="registro" hidden  value="<?php echo $registro; ?>">
					<input type="text" name="cont" id="cont" hidden  value="<?php echo $cont; ?>">
					<?php 
							for ($i=0; $i <$cont ; $i++) 
						{
					     echo '<input type="hidden" name="datoid[]" value="'. $datosid[$i]. '">';
						 echo '<input type="hidden" name="datoeve[]" value="'. $datoseve[$i]. '">';
						 echo '<input type="hidden" name="datociudad[]" value="'. $datosciudad[$i]. '">';
						}					
					 ?>

					<button class="btn btn-primary" id="submit" type="submit">Adicionar y Cambiar Institución de los Asistentes</button>
				</form>	
			    </div>
			</div>
			
			<div class="row table-responsive">
				<table id="example" class="table table-striped text-center">
					<thead>
						<tr >
							<th>Numero de Identificación</th>
							<th>ID Evento</th>
							<th>Nombre del Evento</th>
							<th>Registro</th>
							<th>Ciudad</th>
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
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
			<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item "><a href="index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
		</div>
		
		
	</body>
	<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>
<script src="../../../Views/public/js/table.js"></script>
<script src="../../../Views/public/js/select2.js"></script>
<script type="text/javascript">
		  $(document).ready(function(){
		          $('#idinstitucion').select2({placeholder: 'Escoge una' });
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