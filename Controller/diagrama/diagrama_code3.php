<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
//require_once "modelo_grafico.php";


if (isset($_GET['programa']) || ($_GET['programa'] = "")) {
	$programa = (isset($_GET['programa'])) ? $_GET['programa'] : "";
	$idciudad = $_SESSION['idciudad'];

	$ciudadevento = "SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
	$ciudadrespuesta = $link->query($ciudadevento);
	foreach ($ciudadrespuesta as $rowciudadrespuesta) {
		$nombreciudadevento = $rowciudadrespuesta['nombre'];
	}
	$idevento = (isset($_GET['idevento'])) ? $_GET['idevento'] : "";

	$sql3 = "SELECT evento_programas.programa,programas.nombreprograma AS nombre,evento.nombreevento,
					evento_programas.idevento,evento.estado FROM evento_programas  
					INNER JOIN programas ON programas.idprograma=evento_programas.programa
					INNER JOIN evento ON evento.idevento=evento_programas.idevento WHERE evento.idciudad='$idciudad' AND evento_programas.programa='$programa'
					";
	$resultado3 = $link->query($sql3);
	$row3 = $resultado3->fetch_array(MYSQLI_ASSOC);
} else {
	header('location: index.php');
}



require_once "../../../Views/funtion/diagrama/diagrama3.php";
