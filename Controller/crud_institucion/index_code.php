<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$idciudad = $_SESSION['idciudad'];
$sql = "SELECT institucion_educativa.idinstitucion,institucion_educativa.nombre,institucion_educativa.telefono,institucion_educativa.direccion,ciudad.nombre AS nombreciudad FROM institucion_educativa  INNER JOIN ciudad ON ciudad.idciudad = institucion_educativa.idciudad  WHERE institucion_educativa.idciudad='$idciudad' AND idinstitucion != 0 AND idinstitucion != 1 AND idinstitucion != 0 AND idinstitucion != 7 AND idinstitucion != 8 AND idinstitucion != 9 AND idinstitucion != 10 AND idinstitucion != 11 AND idinstitucion != 12 AND idinstitucion != 13 AND idinstitucion != 14 AND idinstitucion != 15 AND idinstitucion != 16 AND idinstitucion != 17 AND idinstitucion != 18";
$resultado = $link->query($sql);

require_once "../../../Views/funtion/crud_institucion/index.php";
