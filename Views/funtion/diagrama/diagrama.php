<html lang="es">

<head>
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

</head>

<body>

  <div class="container">
    <div class="jumbotron">
      <div class="container text-center">
        <img src="../../../Content/logopequeño.png" width="150" class="logo"> <br><br>
        <div class="text-center card border-bottom-danger">
          <hr>
          <h1 class="display-5 font-weight-bold"><strong>Nombre del Evento :<br></strong><?php echo $row['nombreevento']; ?></h1><br>
          <h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2>
          <hr><br>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="text-center">
        <h2><strong>Reporte de Sesion(s)</strong></h2>
        <div>
          <?php while ($row6 = $resultado6->fetch_array(MYSQLI_ASSOC)) { ?>
            <div class="alert alert-danger" role="alert"><strong>Nombre: <?php echo $row6['nombresesion']; ?></strong>
              <i><a href="reporte.php?id=<?php echo $row6['id']; ?>&idevento=<?php echo $row['idevento']; ?>"> Clic aqui para ver Reporte</a></i>
            </div>
          <?php } ?>
        </div>
        <div>
          <?php if ($sesiones > 1) { ?>
            <div class="alert alert-info" role="alert"><strong>Personas que asistieron a todos las Sesiones:</strong>
              <i><a href="reporte_sesion.php?idevento=<?php echo $idevento; ?>"> Clic aqui para ver Reporte</a></i>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="card">

        <header class="container text-center">
          <h1><span class="badge badge-primary">Numero de personas Pre-Inscritas</span> || <span class="badge badge-success"><?php echo $row3['pre_inscripcion']; ?></span></h1>
        </header>

        <div class="container text-center">
          <canvas id="sexo" width="100"></canvas>
          <h3></h3>
        </div>

      </div>
      <br>
      <h2 class="text-center display-4">Asistencia de Secciones</h2>
      <p>
        <?php $cont1 = 0;
        foreach ($resultado2 as $row2) { ?>
      <div class="card text-center">
        <header class="alert alert-primary" role="alert">
          <h4><strong><?php echo $nombre[$cont1] ?></strong> ||
            <i><a><span class="badge badge-secondary">ID: <?php echo $row2['idsesion']; ?></span></a></i>
          </h4>
        </header>

        <div class="container">
          <h4>Numero de personas que Asistieron :<strong> <span class="badge badge-danger"><?php echo $row2['asistente_sesion']; ?></span></strong></p>
            <h3></h3>
        </div>

      </div>

    <?php $cont1 = $cont1 + 1;
        } ?>
    </div>

    <div class="container text-center">
      <div class="card">
        <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
        <div class="card-header">
          Grafico de Personas Registradas
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-5 ">
              <canvas id="myChart" width="400" height="400"></canvas>
            </div>
          </div>
        </div>

      </div>
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

</html>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- GRAFICAS LIBRERIA-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>
<script src="../../../Views/public/js/table.js"></script>
<script src="../../../Views/public/js/diagrama.js"></script>