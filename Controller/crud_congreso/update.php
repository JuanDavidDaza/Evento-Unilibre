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


$sql = "UPDATE evento SET nombreevento='$nombreevento', certificado='$certificado', generalinfo='$generalinfo', tematica='$tematica', responsable='$responsable', estado='$estado', idciudad='$idciudad' WHERE idevento = '$idevento'";
$resultado = $link->query($sql);

require_once "../../../Views/funtion/crud_congreso/update.php";
