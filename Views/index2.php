
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> Login - Eventos</title>
    <link rel="stylesheet" type="text/css" href="../Views/public/css/estilos3.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
</head>
<body>
    <div class="container-all">
        <div class="ctn-form">
            <img src="../Content/logopequeño.png" alt="" class="logo">
            <h1 class="title">Iniciar Sesión</h1>

            <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="">Email</label>
                <input type="text" name="email">
                <span class="msg-error"><?php echo $email_err; ?></span>
                <label for="">Contraseña</label> 
                <input type="password" name="password">
                <span class="msg-error"><?php echo $password_err; ?></span>
                <?php if ($_SESSION["login_attempts"] > 2)
                    {
                        $_SESSION["locked"] = time();
                        echo "Superaste el numero de intentos permitidos, por favor espere 30 segundos";
                    }
                    else
                    {
                ?>
                    <br><div class="g-recaptcha" data-sitekey="6LdFdckaAAAAACwrthiqcaeCETBHyJ8-Z6tfdJT2"></div>
                   <input type="submit" value="Iniciar">
                <?php } ?>
                
                
            </form>
    </div>
    <div class="ctn-text">
        <div class="capa"></div>
        <h1 class="title-description">Universidad Libre Seccional Cali</h1>
        <p class="text-description"></p>

    </div>
</body>



<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
  window.onload = function() {
  var recaptcha = document.forms["form"]["g-recaptcha-response"];
  recaptcha.required = true;
  recaptcha.oninvalid = function(e) {
    alertify.notify('Favor confirmar el captcha', 'warning', 5, function(){  console.log('dismissed'); });
  }
}


</script>
</html>