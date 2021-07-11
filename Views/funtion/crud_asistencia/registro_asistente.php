<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .error {
            color: red;
            font-size: 90%;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../../../Views/public/css/select2.css">
    <script src="../../../Views/public/js/select2.js"></script>
    <link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

</head>

<body>
    <div class="container">
        <div class="container text-center jumbotron">
            <img src="../../../Content/logopequeño.png" width="150" class="logo">
            <h2><STRONG>UNIVERSIDAD LIBRE <br> Gestión de Asistencia al Evento</STRONG></h2><br>
            <h1><strong>REGISTRO AL EVENTO</strong></h1>
            <h2><strong>Evento:</strong> <?php echo $evento; ?></h2>
        </div>

        <form name="contactForm" onsubmit="return validateForm()" id="contactForm" action="registro_c.php" method="post">


            <div class="form-group"><label for="tipoid">Tipo de Documento</label>
                <select name="tipoid" id="tipoid" class="form-control">
                    <option value="TI">Tarjeta de identidad</option>
                    <option value="CC" selected>Cédula de ciudadanía</option>
                    <option value="CE">Cédula de extranjería</option>
                </select>
            </div>

            <div class="form-group">
                <label>Numero de Identificación</label>
                <input class="form-control" type="text" name="idasistente" maxlength="11">
                <div class="error" id="idasistenteErr"></div>
            </div>

            <div class="form-group">
                <label>Nombre Completo</label>
                <input class="form-control" type="text" name="name" maxlength="50">
                <div class="error" id="nameErr"></div>
            </div>

            <div class="form-group">
                <label>Numero Telefónico</label>
                <input class="form-control" type="text" name="mobile" maxlength="10">
                <div class="error" id="mobileErr"></div>
            </div>

            <div class="form-group">
                <label>Género</label>
                <div class="form-inline">
                    <label><input type="radio" name="gender" value="M"> Masculino</label>
                    <label><input type="radio" name="gender" value="F"> Femenino</label>
                    <label><input type="radio" name="gender" value="No desea responder"> No desea responder</label>
                </div>
                <div class="error" id="genderErr"></div>
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input class="form-control" type="text" name="email" maxlength="50">
                <div class="error" id="emailErr"></div>
            </div>
            <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />

            <div class="form-group">
                <label>Institución o Entidad</label>
                <select name="idinstitucion" id="idinstitucion" class="form-control item_unit" onchange="seleccionado()"><?php echo InstitucionCiudad($connect, $idciudad); ?></select>
            </div>
            <div class="form-group" id="otro" style="display:none;">
                <label>¿Cuál?</label>
                <input class="form-control" type="text" name="cual" maxlength="50">
                <div class="error" id="cualErr"></div>
            </div>
            <div class="text-center">
                <input class="btn btn-info btn-lg btn-block" type="submit" value="Registrar">
            </div>
        </form>


    </div>


</body>

</html>
<script src="../../../Views/public/js/inscripcionvalidacion.js"></script>
<?php include('../../../Views/public/bootstrap/sesion.php'); ?>
<script src="../../../Views/public/js/sesion2.js"></script>
<script type="text/javascript">
    function seleccionado() {
        var opt = $('select[name="idinstitucion"] option:selected').val();
        //alert(opt);
        if (opt == "0" || opt == "7" || opt == "8" || opt == "9" || opt == "10" || opt == "11" || opt == "12") {
            $('#otro').show();
        } else {
            $('#otro').hide();
        }
    }
    $(document).ready(function() {
        $('#idinstitucion').select2({
            placeholder: 'Escoge una'
        });
    });
</script>