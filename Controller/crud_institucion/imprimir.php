<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$idciudad = $_SESSION['idciudad'];
$sql = "SELECT institucion_educativa.idinstitucion,institucion_educativa.nombre,institucion_educativa.telefono,institucion_educativa.direccion,ciudad.nombre AS nombreciudad FROM institucion_educativa  INNER JOIN ciudad ON ciudad.idciudad = institucion_educativa.idciudad  WHERE institucion_educativa.idciudad='$idciudad'";
$resultado = $link->query($sql);

require_once "../../../Views/funtion/crud_institucion/imprimir.php";
