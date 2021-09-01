<?php
//valido si es del rol indicado
require_once "../../../Model/BD.php";
require_once "../../../Model/session_admin3.php";

$idasistente = $_GET['idasistente'];
$idevento = $_GET['idevento'];
$id = $_GET['id'];


$sql1 = "DELETE FROM asistente_sesion WHERE idasistente = '$idasistente' and idevento='$idevento'";
$resultado1 = $link->query($sql1);
//echo $sql1;

$sql = "DELETE FROM pre_inscripcion WHERE idasistente = '$idasistente' and idevento='$idevento'";
$resultado = $link->query($sql);
//echo $sql;

require_once "../../../Views/funtion/vistas/crud/ps.php";
require('../../../Views/funtion/crud_asistencia/eliminar.php');
require_once "../../../Views/funtion/vistas/crud/pi.php";