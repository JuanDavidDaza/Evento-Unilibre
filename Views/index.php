<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="Views/public/css/evo-calendar.css" />
  <link rel="stylesheet" type="text/css" href="Views/public/css/evo-calendar.orange-coral.css" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">
  <title>Registro de Eventos || Universidad Libre Secciona Cali</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Views/public/fonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="Views/public/css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link rel="shortcut icon" href="Content/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="Views/public/css/select2.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <style type="text/css">

  </style>
</head>

<body>



  <!-- Barra de Navegación-->
  <nav id="menu" class="navbar navbar-expand-lg navbar-default navbar-light fixed-top">
    <div class="container text-center">
      <a class="navbar-brand" href="index.php"><img src="Content/logoUL-negro.png" width="180"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item"><a href="#home" class="page-scroll nav-link">Home</a></li>
          <li class="nav-item"><a href="#about-section" class="page-scroll nav-link">Acerca de</a></li>
          <li class="nav-item"><a href="#Calendario" class="page-scroll nav-link">Agenda</a></li>
          <li class="nav-item"><a href="#Eventos_Activos" class="page-scroll nav-link">Eventos Activos</a></li>

        </ul>
        <a href="System/index.php" class="float-right"> Inicio de Sesión</a>

      </div>
    </div>
  </nav>

  <header class="text-center" name="home">

    <div class="intro-text">

      <h1>Eventos <span class="color">Unilibre</span></h1>
      <p>Esta página permite la preinscripción a nuestros eventos, bienvenidos!!!</p>
      <div class="clearfix"></div>
      <a href="#Eventos_Activos" class="btn btn-danger btn-lg page-scroll">Ver Eventos</a>



    </div>
  </header>
  <!-- About Section -->
  <div id="about-section">
    <div class="container" data-aos="fade-up">
      <h2 class="display-5"><strong>Acerca de</strong></h2>
      <hr>
      <br>
    </div>

    <div class="about container">
      <div class="contentBx">
        <h4><strong>Página de registro de eventos</strong></h4>
        <p style="text-align: justify;">Bienvenidos a nuestros eventos activos (Congresos, Conferencias, Talleres y Reuniones tanto virtuales como presenciales), te invitamos a realizar la preinscripción aquí.</p>
      </div>
      <div class="imgBx"></div>
    </div>
    <div class="container">
      <hr>
    </div>

  </div>
  <div id="Calendario">
    <div class="container" data-aos="fade-down">
      <h2 class="display-5"><strong>Agenda</strong></h2>
      <hr>
      <br>
      <div id="calendar"></div>
      <hr>
    </div>
  </div>

  <div>
    <div class=" jumbotron text-center" data-aos="fade-down">
      <div class="row jumbotron eventofiltro" style="justify-content: center; ">
        <div div class="col-xl-7" id="Eventos_Activos">
          <img src="Content/logopequeño.png" width="150"><br><br>
          <h2><strong>Eventos disponibles</strong></h2>
          <div class="search">
            <input type="text" class="search-input " placeholder="Buscar eventos o categorias" id="buscar" name="buscar" onkeyup="buscar_ajax(this.value);"> <a class="search-icon"> <i class="fa fa-search"></i> </a>
          </div>

          <hr>
        </div>
      </div>
      <?php
      include 'Model/eventofiltro.php';
      $eventofiltro = new eventofiltro();
      ?>
      <div class="row">
        <div class="col-md-3 " style="background-color:#a52a2a !important; ">
          <div class="list-group">
            <br>
            <h2 class="text-white">Filtrar eventos por:</h2>

            <div class="">
              <div class="list-group-item checkbox">

                <h3>Tipo</h3>
                <hr>
                <ul class="ks-cboxtags">
                  <?php
                  $brand = $eventofiltro->getBrand();
                  $checkb = ['checkboxOne', 'checkboxTwo', 'checkboxThree', 'checkboxFour', 'checkboxFive'];
                  $ch = 0;
                  foreach ($brand as $brandDetails) {
                  ?>


                    <li><input type="checkbox" class="productDetail brand" id="<?php echo $checkb[$ch]; ?>" value="<?php echo $brandDetails["nombretipo"]; ?>"><label for="<?php echo $checkb[$ch]; ?>"><?php echo $brandDetails["nombretipo"]; ?></label></li>

                  <?php $ch++;
                  } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="list-group">
            <br>

            <div class="list-group-item checkbox">
              <h3>Ciudad</h3>
              <hr>
              <ul class="ks-cboxtags">
                <?php
                $ram = $eventofiltro->getRam();
                $checkb2 = ['checkboxSix', 'checkboxSeven', 'checkboxEight', 'checkboxNine', 'checkboxTen', 'checkboxEleven', 'checkboxTwelve'];
                $ch2 = 0;
                foreach ($ram as $ramDetails) {
                ?>

                  <li><input type="checkbox" class="productDetail ram" id="<?php echo $checkb2[$ch2]; ?>" value="<?php echo $ramDetails['nombre']; ?>"><label for="<?php echo $checkb2[$ch2]; ?>"><?php echo $ramDetails['nombre']; ?></label></li>

                <?php
                  $ch2++;
                }
                ?>
              </ul>
            </div>
          </div>

        </div>
        <div class="col-md-9">
          <br />

          <div class="row searchResult" style="justify-content: center;">
          </div>
        </div>
      </div>




    </div>
  </div>

  <div id="footer">
    <div class="container text-center">
      <p>Copyright &copy; 2020 <a href="http://www.unilibrecali.edu.co" rel="nofollow">Universidad Libre Seccional Cali</a></p>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript" src="Views/public/js/main.js"></script>
  <script src="Views/public/js/evo-calendar.js"></script>
  <script src="Views/public/js/select2.js"></script>
  <script src="Views/public/js/filtro.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#calendar").evoCalendar({
        theme: 'Orange Coral',
        format: "MM dd, yyyy",
        titleFormat: "MM",
        language: 'es',
        calendarEvents: <?php echo '[';
                        for ($i = 0; $i < $n1; $i++) {
                          echo $datos[$i];
                        }
                        echo ']';
                        ?>
      });
    });
  </script>
</body>

</html>