<?php
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	//$sql = "SELECT * FROM evento $where";
	//$sql = "SELECT * FROM evento WHERE estado='Activo'";
	


	$idciudad=$_SESSION['idciudad'];
	//echo $idciudad;

	$ciudadevento="SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
		$ciudadrespuesta = $link->query($ciudadevento);
		foreach($ciudadrespuesta as $rowciudadrespuesta){
			$nombreciudadevento=$rowciudadrespuesta['nombre'];
		}
	//$sql = "SELECT * FROM evento $where";
	if($idciudad !='0'){
		$sql = "SELECT evento_programas.programa,programas.nombreprograma AS nombre, COUNT(evento_programas.idevento) AS cantidad,
					evento_programas.idevento FROM evento_programas  
					INNER JOIN programas ON programas.idprograma=evento_programas.programa
					INNER JOIN evento ON evento.idevento=evento_programas.idevento WHERE evento.idciudad='$idciudad'
					GROUP BY evento_programas.programa";
			$resultado = $link->query($sql);
	}
	else{
		$sql = "SELECT evento_programas.programa,programas.nombreprograma AS nombre, COUNT(evento_programas.idevento) AS cantidad,
					evento_programas.idevento FROM evento_programas  
					INNER JOIN programas ON programas.idprograma=evento_programas.programa
					INNER JOIN evento ON evento.idevento=evento_programas.idevento
					GROUP BY evento_programas.programa";
		$resultado = $link->query($sql);
	}
	require_once "../../../Views/funtion/diagrama/index3.php";
?>