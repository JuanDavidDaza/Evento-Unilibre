<div class="container">

  <div class="text-center card border-bottom-danger">
    <div class=" text-center">
      <img src="../../../Content/logopequeño.png" width="150">
      <h1 class="display-4 font-weight-bold">Nombre del Congreso :</h1>
      <h2><strong><?php echo $row['nombreevento']; ?></strong></h2>
      <h2></strong><span class="badge badge-primary"><?php echo  $row['nombretipo']; ?></span> | <span class="badge badge-danger"><?php echo $row['estado']; ?></span></h2><br>
      <h3>URL DE INSCRIPCIÓN</h3>
      <div class="row">
        <div class="col-xl-11"><input class="text-center" type="url" name="" style="width: 100%;" disabled="disabled" value="http://eventos.unilibre.edu.co/registro.php?idevento=<?php echo $idevento; ?>"><br></div>
        <div class="col-xl-1"><a href="http://eventos.unilibre.edu.co/registro.php?idevento=<?php echo $idevento; ?>" class="btn btn-info" target="_blank" style="width: 100%;">Ir</a></div>
      </div>
      <br><a href="index.php" class="btn btn-dark">&larr; Regresar</a>
    </div>
  </div>
  <br><br>
  <br>



</div>



<div class="container">
  <div class="jumbotron card">
    <div class=" text-center">

    </div>
    <h4><strong>Descripción</strong></h4>
    <p class="lead" style="text-align: justify;"><?php echo $row['generalinfo']; ?></p>
    <hr class="my-4">

    <h4><strong>¿Realiza Certificado?</strong> : <?php echo $row['certificado']; ?></h4>
    <h4><strong>Responsable</strong> : <?php echo $row['responsable']; ?></h4>
    <h4><strong>Ciudad</strong> : <span class="badge badge-info"><?php echo $ciudad; ?></span></h4>
    <hr class="my-4">
  </div>
</div>

<div class="container">
  <div class="jumbotron card">
    <h2 class="display-5">Entidades y/o Programas a cargo de este Evento</h2>
    <br>
    <ul>
      <?php while ($row3 = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
        <h5><a href="<?php echo $row3['url']; ?>" target="_blank"><?php echo $row3['nombreprograma']; ?></a></h5><br>
      <?php } ?>
      <?php while ($row2 = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
        <h5><a href="<?php echo $row2['url']; ?>" target="_blank"><?php echo $row2['nombreentidad']; ?></a></h5><br>
      <?php } ?>
    </ul>
  </div>
</div>

<div class="container jumbotron">
  <strong>
    <h2 class="display-5 text-center">Imagenes del Evento</h2>
  </strong><br>
  <div class="row">
    <?php while ($rowimagen = $resultadoimg->fetch_array(MYSQLI_ASSOC)) { ?>
      <div class="galeria__item text-center container">
        <h3><strong><?php echo $rowimagen['nombre']; ?></strong></h3><img src="../../../Content/evento_foto/<?php echo $rowimagen['foto'] ?>" width="400" height="310" class="galeria__img">
        <p><?php echo $rowimagen['detalles']; ?></p>
      </div>
    <?php } ?>
  </div>
</div>

<div class="container">
  <div class="jumbotron card">
    <div class="text-center ">
      <h2><span class="color">Sesiones para este Evento</span></h2>
    </div>

    <div class="container">
      <?php while ($row4 = $sesion->fetch_array(MYSQLI_ASSOC)) { ?>
        <br>
        <br>
        <h4 class="display-5"><span class=""><?php echo $row4['nombresesion']; ?></span></h4>
        <hr>
        <h5><strong>Descripción</strong></h5>
        <h4 style="text-align: justify;"><?php echo $row4['observacion']; ?></h4>
        <h5><strong>Hora de Inicio y de Fin</strong></h5>
        <h4><?php echo date("g:i a", strtotime($row4['horainicio'])); ?> - <?php echo date("g:i a", strtotime($row4['horafin'])); ?></h4>
        <h5><strong>Fecha</strong></h5>
        <h4><?php echo $row4['fechainicio']; ?></h4>
        <h4><strong>Lugar : </strong> <span class="badge badge-secondary"><?php echo $row4['audsalon']; ?></span></h4>
      <?php } ?>
    </div>
  </div>
</div>


<div id="conferencista">
  <div class="container ">
    <div class="section-title text-center">
      <h1><strong>Conferencistas de este Evento</strong></h1>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <?php while ($rowconfe = $confe->fetch_array(MYSQLI_ASSOC)) { ?>
          <div class="col-lg-4 jumbotron"><img width="100" src="../../../Content/imagenes_conferencistas/<?php echo $rowconfe['foto']; ?>" class="img-responsive img-thumbnail team-img" />
            <div class="caption">
              <h4 class="text-center"><span class="badge badge-info"><?php echo $rowconfe['nombre']; ?></span></h4>
              <p></p>
              <h5><strong>Perfil :</strong></h5>
              <h4><?php echo $rowconfe['perfil']; ?></h4>
              <p></p>
              <h5><strong>Nombre de la Conferencia</strong></h5>
              <h4><?php echo $rowconfe['conferencia']; ?></h4>
              <p></p>
              <h5><strong>Duración</strong></h5>
              <h4><?php echo $rowconfe['duracion']; ?></h4>
              <p></p>
              <h5><strong>LinkedIn</strong></h5>
              <h4><?php echo $rowconfe['linkedin']; ?><i class="fa fa-linkedin-square" style="font-size:34px;color:red"></i></h4>
            </div>
            <hr>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <ul class="pagination">
    <li class="page-item"><a href="index.php" class="page-link">&larr; Regresar</a></li>
  </ul>

</div>