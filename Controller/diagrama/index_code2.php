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
	$sql = "SELECT conferencistas.nombre,evento_conferencistas.nombre AS cedula, COUNT(evento_conferencistas.idevento) AS cantidad, evento.idevento, evento.idciudad
			FROM evento_conferencistas INNER JOIN conferencistas ON evento_conferencistas.nombre=conferencistas.cedula 
			INNER JOIN evento ON evento.idevento=evento_conferencistas.idevento 
			WHERE evento.idciudad = '$idciudad' GROUP BY evento_conferencistas.nombre";
	$resultado = $link->query($sql);
} else {
	$sql = "SELECT conferencistas.nombre,evento_conferencistas.nombre AS cedula, COUNT(evento_conferencistas.idevento) AS cantidad FROM evento_conferencistas INNER JOIN conferencistas ON evento_conferencistas.nombre=conferencistas.cedula GROUP BY evento_conferencistas.nombre";
	$resultado = $link->query($sql);
}

require_once "../../../Views/funtion/diagrama/index2.php";
