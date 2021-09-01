<div class="container">
    <div class="text-center card border-bottom-danger">

        <h2 class="display-4 font-weight-bold"><STRONG>Gestión de Asistencia al Evento</STRONG></h2><br>
        <h2 class="display-4 font-weight-bold"><strong>Registro al evento:</strong> <?php echo $evento; ?></h2>
        <br>
        <br>
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


<script src="../../../Views/public/js/inscripcionvalidacion.js"></script>

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