
  <div class="container">
    <div class="text-center card border-bottom-danger">
      <div class=" text-center">
        <img src="../../../Content/logopequeño.png" width="150" class="logo"> <br><br>
        <div class="text-center card border-bottom-danger">
          <hr>
          <h1 class="display-5 font-weight-bold"><strong>Nombre del Evento :<br></strong><?php echo $row['nombreevento']; ?></h1><br>
          <h2>Ciudad : <span class="badge badge-primary"><?php echo $nombreciudadevento; ?></span></h2>
          <hr><br>
        </div>
      </div>
      <br><br><br>
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
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="../../../Views/public/js/table.js"></script>
<script src="../../../Views/public/js/diagrama.js"></script>