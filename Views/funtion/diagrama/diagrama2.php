
<html lang="es">
	<head>
<!--datables CSS básico-->
<title>Universidad Libre - Conferencista: <?php echo $nombre; ?></title>
   <link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" >       
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../Views/public/bootstrap/css/bootstrap.min.css">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
    <style type="text/css">
		thead input {
        width: 100%;
    }
	</style>
	</head>
	
	<body>
		
		<div class="container">
				<div class="jumbotron text-center">
					<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
					<div class="container text-center card ">
						<hr>
						<h1><strong>Conferencista : <span class="badge badge-primary"> <?php echo $nombre; ?></span></strong></h1>
						<h2><strong>Ciudad : <span class="badge badge-info"><?php echo $row3['nombreciudad']; ?></span> </strong></h2><hr>
					</div>
				</div>
			<div class="row table-responsive">
				<table id="example" class="table table-striped">
					<thead>
						<tr class="text-center">
							<th>Nombre del Evento</th>
							<th>Conferencista</th>
							<th>Nombre de la Conferencia</th>
							<th>Duración</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach($resultado3 as $row3){ ?>
							<tr class="text-center"> 
								<td><?php echo $row3['nombreevento']; ?></td>
								<td><?php echo $nombre;	?></td>
								<td><?php echo $row3['conferencia']; ?></td>
								<td><?php echo $row3['duracion']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item "><a href="index2.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
		</div>
	</body>
</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
	<script src="../../../Views/public/js/sesion2.js"></script>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../../../Views/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../../Views/public/popper/popper.min.js"></script>
    <script src="../../../Views/public/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="../../../Views/public/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="../../../Views/public/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="../../../Views/public/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="../../../Views/public/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../../../Views/public/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="../../../Views/public/js/imprimir.js"></script>  
    