
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></SCRIPT>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
    <link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" > 
	</head>
	
	<body>
		<div class="container">

				<div class="jumbotron">
					<div class="container text-center">
						<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
						<h1><strong>Adicionar Imagenes del Evento</strong></h1>
						<h3>Nombre de la Conferencia | <span class="label label-info"><?php echo $nombreevento;?></span></h3>
					</div>
				</div>
		</div>

			
<div class="container">
	<a href="imagen.php?idevento=<?php echo $row['idevento']; ?>&e=1"  class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Asignar Imagen</a>
	<div class="row">
		<div class="col-sm-12">
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>Imagen</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Acción</th>
				</thead>
				<tbody>
					<?php while($row2 = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr> 
								<td><img class="img-thumbnail" width="100px" src="../../../Content/evento_foto/<?php echo $row2['foto']; ?>"></td>
								<td><?php echo $row2['nombre']; ?></td>
								<td><?php echo $row2['tipo']; ?></td>
								<td><a class="btn btn-danger" href="?delete_id=<?php echo $row2['id']; ?>" title="click for delete" onclick="return confirm('Esta seguro de eliminar el archivo?')">Eliminar</a></td> 
							</tr>
					<?php } ?>	
				</tbody>
			</table>
		</div>
	</div>
	<div class="container text-center">
					
			<H3 class="page-header text-center" align="center"></H3>
			<a class="btn btn-success btn-lg btn-block" href="registro6.php?idevento=<?php echo $row['idevento']; ?>" role="button">SIGUIENTE</a>			
			<h1></h1>
					
	</div>

<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2conf.js"></script>
</body>
</html>
