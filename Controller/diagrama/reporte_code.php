<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

$id = $_GET['id'];
$idevento = $_GET['idevento'];
$idciudad = $_SESSION['idciudad'];
//echo $idciudad;

$ciudadevento = "SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
$ciudadrespuesta = $link->query($ciudadevento);
foreach ($ciudadrespuesta as $rowciudadrespuesta) {
	$nombreciudadevento = $rowciudadrespuesta['nombre'];
}

//$sql = "SELECT * FROM pre_inscripcion where idevento = '$idevento'";
$sql = "SELECT idasistente,idevento,asistente_sesion.nombre,idsesion,tipoid,correo,celular,genero,institucion_educativa.nombre AS idinstitucion FROM asistente_sesion INNER JOIN institucion_educativa ON  institucion_educativa.idinstitucion = asistente_sesion.idinstitucion  WHERE idsesion = '$id'";

$sql1 = "SELECT idevento,evento_tipo.nombretipo,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE idevento = '$idevento'";
//$sql1 = "SELECT * FROM evento where idevento = '$idevento'";


$resultado = $link->query($sql);
$resultado1 = $link->query($sql1);
$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

$fechaActual = date('d-m-Y');

$sql3 = "SELECT nombresesion, id FROM evento_sesion WHERE id='$id'";
$resultado3 = $link->query($sql3);
$row3 = $resultado3->fetch_array(MYSQLI_ASSOC);


if ($row3['nombresesion'] !== $row1['nombreevento']) {
	$nombredesesion = $row3['nombresesion'];
} else {
	$nombredesesion = "*";
}




require_once "../../../Views/funtion/vistas/crud/ps2.php";
require_once "../../../Views/funtion/diagrama/reporte.php";
require_once "../../../Views/funtion/vistas/crud/pi2.php";