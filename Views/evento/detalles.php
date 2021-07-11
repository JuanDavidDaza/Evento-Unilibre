<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $row['nombreevento']; ?> || Universidad Libre Secciona Cali</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="Views/public/css/style.css">
  <link rel="stylesheet" type="text/css" href="Views/public/css/imagen.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="./Content/favicon.ico" type="image/x-icon">
</head>

<body>
  <!-- Barra de Navegación-->
  <nav id="menu" class="navbar navbar-expand-lg navbar-default navbar-light fixed-top">
    <div class="container text-center">
      <a class="navbar-brand" href="./index.php"><img src="./Content/logoUL-negro.png" width="180"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item"><a href="index.php" class="page-scroll nav-link">Página Principal</a></li>
          <li class="nav-item"><a href="#home" class="page-scroll nav-link">Home</a></li>
          <li class="nav-item"><a href="#about-section" class="page-scroll nav-link">Detalles</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="text-center" name="home">
    <div class="container intro-text">
      <h1>Nombre del Evento :</h1><br>
      <h2><span class="color"><?php echo $row['nombreevento']; ?></span></h2><br>
      <div class="clearfix"></div>
      <a href="#about-section" class="btn btn-default btn-lg page-scroll">Ver Detalles</a>
    </div>
  </header>

  <div id="about-section">
    <div class="container">
      <div class="jumbotron">
        <div class="container text-center">
          <img src="./Content/logopequeño.png" width="150" class="logo">
          <p></p>
          <h2></strong><span class="badge badge-primary"><?php echo  $nombretipo ?></span> | <span class="badge badge-danger"><?php echo $row['estado']; ?></span></h2>
        </div>
        <h4><strong>Descripción</strong></h4>
        <p class="lead" style="text-align: justify;"><?php echo $row['generalinfo']; ?></p>
        <hr class="my-4">

        <h4><strong>¿Realiza Certificado?</strong> : <?php echo $row['certificado']; ?></h4>
        <h4><strong>Responsable</strong> : <?php echo $row['responsable']; ?></h4>
        <h4><strong>Ciudad</strong> : <span class="badge badge-danger"><?php echo $ciudad; ?></span></h4>
        <hr class="my-4">


      </div>
    </div>
  </div>



  <!--contenido 2 -->
  <div id="contenido_color">
    <div class="container">
      <div class="contenido2">
        <div class="contentBx">
          <h2 class="heading">Entidades y Programas a cargo de este Evento</h2>
          <input id="idtipoeve" type="number" hidden name="idtipoeve" value="<?php echo $idtipoeve; ?>" />
          <?php while ($row3 = $resultado3->fetch_array(MYSQLI_ASSOC)) { ?>
            <a href="<?php echo $row3['url']; ?>" target="_blank"><?php echo $row3['nombreprograma']; ?></a><br>
          <?php } ?>
          <p></p>
          <?php while ($row2 = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
            <a href="<?php echo $row2['url']; ?>" target="_blank"><?php echo $row2['nombreentidad']; ?></a><br>
          <?php } ?>
        </div>
        <div class="imgBx"></div>
      </div>
    </div>
    <br>
    <br>
  </div>

  <div id="conferencista">
    <div class="container">
      <div class="section-title text-center">
        <h1><strong>Conferencistas de este Evento</strong></h1>
        <hr>
      </div>
      <div class="container">
        <div class="space"></div>
        <div class="row">
          <?php while ($rowconfe = $confe->fetch_array(MYSQLI_ASSOC)) { ?>
            <div class="col-lg-4 jumbotron"><img width="100" src="./Content/imagenes_conferencistas/<?php echo $rowconfe['foto'] ?>" class="img-responsive img-thumbnail team-img" />
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


  <div id="contenido_color">
    <div class="galeria row">
      <?php while ($rowimagen = $resultadoimg->fetch_array(MYSQLI_ASSOC)) { ?>
        <div class="galeria__item text-center container">
          <h3><strong><?php echo $rowimagen['nombre']; ?></strong></h3><img src="./Content/evento_foto/<?php echo $rowimagen['foto'] ?>" width="400" height="310" class="galeria__img">
          <p><?php echo $rowimagen['detalles']; ?></p>
        </div>
      <?php } ?>
    </div>
    <div class="container">
      <div class="text-center ">
        <h1><span class="color">Sesiones para este Evento</span></h1>
      </div>

      <p></p>
      <div class="jumbotron">

        <?php while ($row4 = $sesion->fetch_array(MYSQLI_ASSOC)) { ?>
          <h2 class="text-center title_event"><span class="badge badge-dark"><?php echo $row4['posicion']; ?>.</span> <?php echo $row4['nombresesion']; ?></h2>
          <hr>
          <br>
          <ul>
            <h5>Descripción</h5>
            <h4 style="text-align: justify;"><?php echo $row4['observacion']; ?></h4>
            <h5>Hora de Inicio y de Fin</h5>
            <h4><?php echo date("g:i a", strtotime($row4['horainicio'])); ?> - <?php echo date("g:i a", strtotime($row4['horafin'])); ?></h4>
            <h5>Fecha</h5>
            <h4><?php echo $row4['fechainicio']; ?></h4>
            <h6><strong>Lugar : </strong> <span class="badge badge-secondary"><?php echo $row4['audsalon']; ?></span></h6>
            <p></p>

          <?php } ?>

      </div>

    </div>


    <div id="boton">
      <div class="text-center container">
        <a class="btn btn-success btn-lg" href="./registro.php?idevento=<?php echo $row['idevento']; ?>" role="button">Inscripción</a>

      </div>
    </div>
  </div>

  <div id="footer">
    <div class="container text-center">
      <p>Copyright &copy; 2020 <a href="http://www.unilibrecali.edu.co" rel="nofollow">Universidad Libre Seccional Cali</a></p>
    </div>
  </div>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./Views/public/js/main.js"></script>
<script type="text/javascript" src="./Views/public/js/imagen.js"></script>
<script type="text/javascript" src="./Views/public/js/detalles.js"></script>