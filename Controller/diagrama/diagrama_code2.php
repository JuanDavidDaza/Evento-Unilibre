<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
//require_once "modelo_grafico.php";


if (isset($_GET['cedula']) || ($_GET['cedula'] = "")) {
	$cedula = (isset($_GET['cedula'])) ? $_GET['cedula'] : "";

	$sql = "SELECT cedula, nombre FROM conferencistas WHERE cedula=$cedula";
	$resultado = $link->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

	$nombre = $row['nombre'];
	$idciudad = $_SESSION['idciudad'];


	$sql3 = "SELECT evento.nombreevento,evento_conferencistas.nombre,evento_conferencistas.conferencia, evento_conferencistas.duracion,ciudad.nombre AS nombreciudad 
				FROM evento_conferencistas 
				INNER JOIN evento ON evento_conferencistas.idevento=evento.idevento
				INNER JOIN ciudad ON ciudad.idciudad=evento.idciudad 
				INNER JOIN conferencistas ON evento_conferencistas.nombre=conferencistas.cedula WHERE cedula='$cedula' AND evento.idciudad='$idciudad'";
	$resultado3 = $link->query($sql3);
	$row3 = $resultado3->fetch_array(MYSQLI_ASSOC);
} else {
	header('location: index.php');
}



require_once "../../../Views/funtion/vistas/crud/ps2.php";
require_once "../../../Views/funtion/diagrama/diagrama2.php";
require_once "../../../Views/funtion/vistas/crud/pi2.php";