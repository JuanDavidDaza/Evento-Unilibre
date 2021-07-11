
<html lang="es">
	<head>
<!--datables CSS básico-->
<title>Universidad Libre - Entidad: <?php echo $row3['entidad']; ?></title>
   <link rel="shortcut icon"  href = "../../../Content/favicon.ico" type="image/x-icon" >       
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../Views/public/bootstrap/css/bootstrap.min.css">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	 
    <style type="text/css">
		thead input {
        width: 100%;
    }
	</style>
	</head>
	
	<body>
		
		<div class="container">
			<input  id="idciudad" hidden name="idciudad" value="<?php echo $idciudad; ?>"  />
			<input  id="entidad" hidden name="entidad" value="<?php echo $row3['entidad']; ?>"  />
				<div class="jumbotron text-center">
					<img src="../../../Content/logopequeño.png" width="150" class="logo"> 
					<div class="container text-center card ">
						<hr>
						<h1><strong>Entidad : <span class="badge badge-primary"> <?php echo $row3['nombre']; ?></span></strong></h1>
						<h2><strong>Ciudad : <span class="badge badge-info"><?php echo $nombreciudadevento; ?></span> </strong></h2><hr>
					</div>
				</div>
			<div class="row table-responsive">
				<table id="example" class="table table-striped">
					<thead>
						<tr class="text-center">
							<th>Nombre de la Entidad</th>
							<th>Codigo del Evento</th>
							<th>Evento</th>
							<th>Estado</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach($resultado3 as $row3){ ?>
							<tr class="text-center"> 
								<td><?php echo $row3['nombre']; ?></td>
								<td><?php echo $row3['idevento']; ?></td>
								<td><?php echo $row3['nombreevento']; ?></td>
								<td><?php echo $row3['estado']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<br>
			<div class="card">

                            <header class="container text-center">
                              <h3><span class="badge badge-primary">Estado del Evento en la Entidad</span> || <span class="badge badge-success"><?php echo $row3['nombre'];?></span></h3>
                            </header>

                            <div class="container text-center">
                              <canvas id="estado" width="80"></canvas>
                              <h3></h3>
                            </div>

                        </div>
			<div class="row mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item "><a href="index4.php" class="page-link">&larr; Regresar</a></li>
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
      <!-- GRAFICAS LIBRERIA-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" src="../../../Views/public/js/diagrama4.js"></script>