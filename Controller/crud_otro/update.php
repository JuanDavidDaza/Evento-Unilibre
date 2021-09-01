<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";
$nombreevento = (isset($_POST['nombreevento'])) ? $_POST['nombreevento'] : "";
$O_tipo = (isset($_POST['O_tipo'])) ? $_POST['O_tipo'] : "";
$generalinfo = (isset($_POST['generalinfo'])) ? $_POST['generalinfo'] : "";
$tematica = (isset($_POST['tematica'])) ? $_POST['tematica'] : "";
$responsable = (isset($_POST['responsable'])) ? $_POST['responsable'] : "";
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : "";
$idciudad = (isset($_POST['idciudad'])) ? $_POST['idciudad'] : "";
$registro = (isset($_POST['registro'])) ? $_POST['registro'] : "";

$sql = "UPDATE evento SET nombreevento='$nombreevento', certificado='', generalinfo='$generalinfo', tematica='$tematica', responsable='$responsable', estado='$estado', idciudad='$idciudad',O_tipo='$O_tipo',registro='$registro' WHERE idevento = '$idevento'";
$resultado = $link->query($sql);




require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/crud_otro/update.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";
