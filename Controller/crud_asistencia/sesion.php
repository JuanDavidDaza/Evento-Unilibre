<?php
//valido si es del rol indicado
require_once "../../../Model/BD.php";
require_once "../../../Model/session_admin3.php";

$idevento = $_GET['idevento'];

//$sql = "SELECT * FROM pre_inscripcion where idevento = '$idevento'";
$sql = "SELECT evento.idevento,evento_sesion.id,evento_sesion.`nombresesion`,evento_sesion.audsalon,evento_sesion.`horainicio`,evento_sesion.`horafin`,evento_sesion.`fechainicio`,evento_sesion.`horafin`,evento.`nombreevento`,evento_sesion.`fechafin` FROM evento_sesion INNER JOIN evento ON  evento_sesion.idevento = evento.idevento WHERE evento_sesion.idevento = '$idevento' ORDER BY evento_sesion.posicion ASC";

//$sql1 = "SELECT * FROM evento where idevento = '$idevento'";
$resultado = $link->query($sql);
$resultado1 = $link->query($sql);
$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

require_once "../../../Views/funtion/vistas/crud/ps.php";
require('../../../Views/funtion/crud_asistencia/sesion.php');
require_once "../../../Views/funtion/vistas/crud/pi.php";
