<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
//require_once "modelo_grafico.php";


if (isset($_GET['entidad']) || ($_GET['entidad'] = "")) {
	$entidad = (isset($_GET['entidad'])) ? $_GET['entidad'] : "";
	$idciudad = $_SESSION['idciudad'];

	$ciudadevento = "SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
	$ciudadrespuesta = $link->query($ciudadevento);
	foreach ($ciudadrespuesta as $rowciudadrespuesta) {
		$nombreciudadevento = $rowciudadrespuesta['nombre'];
	}
	$idevento = (isset($_GET['idevento'])) ? $_GET['idevento'] : "";

	$sql3 = "SELECT evento_entidades.entidad,entidad.nombreentidad AS nombre,evento.nombreevento,
					evento_entidades.idevento,evento.estado FROM evento_entidades  
					INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad
					INNER JOIN evento ON evento.idevento=evento_entidades.idevento WHERE evento.idciudad='$idciudad' AND evento_entidades.entidad='$entidad'
					";
	$resultado3 = $link->query($sql3);
	$row3 = $resultado3->fetch_array(MYSQLI_ASSOC);
} else {
	header('location: index.php');
}

require_once "../../../Views/funtion/diagrama/diagrama4.php";
