<!DOCTYPE HTML>
<html lang="es">

<head>
    <title>Inscripción al Evento <?php echo $row['nombreevento']; ?></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="./Views/public/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./Views/public/css/estilosfor.css">
    <link rel="shortcut icon" href="./Content/favicon.ico" type="image/x-icon">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style type="text/css">
        .select2 {
            width: 100% !important;
        }
    </style>


    <link rel="stylesheet" type="text/css" href="./Views/public/css/select2.css">


</head>

<body>

    <div class="container-all">

        <div class="ctn-form">
            <img src="./Content/logopequeño.png" width="150" class="logo">
            <h1 class="title">Registro al Evento</h1>
            <form name="contactForm" onsubmit="return validateForm()" id="contactForm" action="registro_c.php" method="post">


                <div class="form-group"><label for="tipoid">Tipo de Documento</label>
                    <select name="tipoid" id="tipoid" class="form-control">
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="CC" selected>Cédula de ciudadanía</option>
                        <option value="CE">Cédula de extranjería</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Número de Identificación</label>
                    <input class="form-control" type="text" name="idasistente" maxlength="11">
                    <div class="error" id="idasistenteErr"></div>
                </div>

                <div class="form-group">
                    <label>Nombre Completo</label>
                    <input class="form-control" type="text" name="name" maxlength="50">
                    <div class="error" id="nameErr"></div>
                </div>

                <div class="form-group">
                    <label>Número Telefónico</label>
                    <input class="form-control" type="text" name="mobile" maxlength="10">
                    <div class="error" id="mobileErr"></div>
                </div>
                <input type='number' value='<?php echo $tipoevento; ?>' hidden id='tipoevento'>
                <div class="form-group">
                    <label>Género</label>
                    <div class="form-inline">
                        <label><input type="radio" name="gender" value="M"> Masculino</label>
                        <label><input type="radio" name="gender" value="F"> Femenino</label>
                        <label><input type="radio" name="gender" value="No desea responder"> No desea responder</label>
                    </div>
                    <div class="error" id="genderErr"></div>
                </div>

                <input type="text" value="<?php echo $horainicio; ?>" hidden id="hora_inicio">
                <input type="text" value="<?php echo $horafin; ?>" hidden id="hora_fin">
                <input type="text" value="<?php echo $fechainicio; ?>" hidden id="fecha_inicio">

                <div class="form-group">
                    <label>Correo</label>
                    <input class="form-control" type="text" name="email" maxlength="50">
                    <div class="error" id="emailErr"></div>
                </div>
                <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
                <input type="hidden" name="google-response-token" id="google-response-token">

                <div class="form-group">
                    <label>Institución o Entidad</label>
                    <select name="idinstitucion" id="idinstitucion" class="form-control item_unit" onchange="seleccionado()"><?php echo box2($connect, $idciudad); ?></select>
                </div>

                <div class="form-group" id="otro" style="display:none;">
                    <label>¿Cuál?</label>
                    <input class="form-control" type="text" name="cual" maxlength="50">
                    <div class="error" id="cualErr"></div>
                </div>
                <br>
                <div class="g-recaptcha" data-sitekey="6LdFdckaAAAAACwrthiqcaeCETBHyJ8-Z6tfdJT2"></div>
                <div class="error" id="recaptchaErr"></div>
                <input class="" type="submit" id="submit" value="Registrarse">
            </form>

        </div>
        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description2 page-header text-center" align="center">Universidad Libre</h1>
            <h1 class="title-description text-center page-header "><strong><?php echo $row['nombreevento']; ?></strong></h1>
            <p class="text-description" style="text-align: justify;"><?php echo  $row['generalinfo']; ?></p><br>
            <?php echo $d; ?>



        </div>
    </div>

    <div id="alert" class="">

        <span id="alert_message"></span>
    </div>

</body>






</html>


<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="./Views/public/js/validacion.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./Views/public/js/select2.js"></script>
<script type="text/javascript" src="./Views/public/js/registrop.js"></script>