<?php

//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";
$nombreevento = (isset($_POST['nombreevento'])) ? $_POST['nombreevento'] : "";
$certificado = (isset($_POST['certificado'])) ? $_POST['certificado'] : "";
$generalinfo = (isset($_POST['generalinfo'])) ? $_POST['generalinfo'] : "";
$tematica = (isset($_POST['tematica'])) ? $_POST['tematica'] : "";
$responsable = (isset($_POST['responsable'])) ? $_POST['responsable'] : "";
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : "";
$idciudad = (isset($_POST['idciudad'])) ? $_POST['idciudad'] : "";

//echo $idevento. ",";
//echo $nombreevento. ",";
//echo $certificado. ","; 
//echo $generalinfo. ",";
//echo $tematica. ",";
//echo $responsable. ",";
//echo $estado. ",";
//echo $idciudad. ",";


$audsalon = (isset($_POST['audsalon'])) ? $_POST['audsalon'] : "";
$horainicio = (isset($_POST['horainicio'])) ? $_POST['horainicio'] : "";
$horafin = (isset($_POST['horafin'])) ? $_POST['horafin'] : "";
$fechainicio = (isset($_POST['fechainicio'])) ? $_POST['fechainicio'] : "";
//$fechafin=(isset($_POST['fechafin']))?$_POST['fechafin']:"";


$sql = "UPDATE evento SET nombreevento='$nombreevento', certificado='$certificado', generalinfo='$generalinfo', tematica='$tematica', responsable='$responsable', estado='$estado', idciudad='$idciudad' WHERE idevento = '$idevento'";
$resultado = $link->query($sql);

$sql1 = "UPDATE evento_sesion SET audsalon='$audsalon',nombresesion='$nombreevento', horainicio='$horainicio', horafin='$horafin', fechainicio='$fechainicio', fechafin='$fechainicio' WHERE idevento = '$idevento'";
$resultado1 = $link->query($sql1);


require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/crud_conferencista/update.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";
