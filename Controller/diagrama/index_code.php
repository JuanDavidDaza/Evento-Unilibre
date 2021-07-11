<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

//$sql = "SELECT * FROM evento $where";
//$sql = "SELECT * FROM evento WHERE estado='Activo'";	

$idciudad = $_SESSION['idciudad'];
//echo $idciudad;

$ciudadevento = "SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
$ciudadrespuesta = $link->query($ciudadevento);
foreach ($ciudadrespuesta as $rowciudadrespuesta) {
	$nombreciudadevento = $rowciudadrespuesta['nombre'];
}

//$sql = "SELECT * FROM evento $where";
if ($idciudad != '0') {
	$sql = "SELECT idevento,evento_tipo.nombretipo AS idtipoeve,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE estado='Activo' and evento.idciudad = '$idciudad'";
	$resultado = $link->query($sql);
} else {
	$sql = "SELECT idevento,evento_tipo.nombretipo AS idtipoeve,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE estado='Activo'";
	$resultado = $link->query($sql);
}

require_once "../../../Views/funtion/diagrama/index.php";
