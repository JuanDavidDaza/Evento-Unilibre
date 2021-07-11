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
	$sql = "SELECT evento_entidades.entidad,entidad.nombreentidad AS nombre, COUNT(evento_entidades.idevento) AS cantidad,
					evento_entidades.idevento FROM evento_entidades  
					INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad
					INNER JOIN evento ON evento.idevento=evento_entidades.idevento  WHERE evento.idciudad='$idciudad'
					GROUP BY evento_entidades.entidad";
	$resultado = $link->query($sql);
} else {
	$sql = "SELECT evento_entidades.entidad,entidad.nombreentidad AS nombre, COUNT(evento_entidades.idevento) AS cantidad,
					evento_entidades.idevento FROM evento_entidades  
					INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad
					INNER JOIN evento ON evento.idevento=evento_entidades.idevento
					GROUP BY evento_entidades.entidad";
	$resultado = $link->query($sql);
}
require_once "../../../Views/funtion/diagrama/index4.php";
