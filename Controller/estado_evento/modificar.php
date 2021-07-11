<?php
//error_reporting(0);

if (isset($_POST["user_id"])) {
  require_once "../../Model/BD.php";

  $BD = new basedatos();


  $status = '';
  $idciudad = $_POST['user_id'];




  $fecha_actual = strtotime(date("Y-m-d"));
  $queryc = "SELECT * FROM evento  WHERE evento.idciudad='$idciudad'
";
  $result = $link->query($queryc);
  foreach ($result as $row) {
    $contadorsesionesf = 0;
    $n_evento = 0;



    $idevento = $row['idevento'];
    $eve_1 = "SELECT evento_sesion.idevento, COUNT(*) AS evento   FROM evento_sesion INNER JOIN evento ON evento_sesion.idevento=evento.idevento WHERE evento.idevento='$idevento'
";
    $resultado_eve = $link->query($eve_1);
    $row112 = $resultado_eve->fetch_array(MYSQLI_ASSOC);

    $sesiones = $row112['evento'];



    $eve_2 = "SELECT * FROM evento_sesion WHERE idevento='$idevento'
";
    $resultado_eve2 = $link->query($eve_2);

    foreach ($resultado_eve2 as $row113) {

      $fecha_entrada = strtotime("" . $row113['fechafin'] . "");
      //echo $fecha_entrada;
      if ($fecha_actual > $fecha_entrada) {
        //echo "ID:".$idevento."fechafin: ".$fecha_entrada;
        //echo $contadorsesionesf."-";
        $contadorsesionesf = $contadorsesionesf + 1;
      }
    }

    if ($contadorsesionesf == $sesiones) {
      //echo $contadorsesionesf.",";
      $sqlc = "UPDATE evento SET  estado='Cerrado' WHERE idevento = '$idevento'";
      $resultadoc = $link->query($sqlc);
      $n_evento = $n_evento + 1;
    }
  }
  echo '<div class="alert alert-success">Se cambiaron los Eventos que presentaron todas las sesiones ya finalizadas a estado <strong>Cerrado</strong></div>';
}
