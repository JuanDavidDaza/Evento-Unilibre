<?php
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	$acentos = $link->query("SET NAMES 'utf8'");
	$idciudad=$_SESSION['idciudad'];
	
	//$sql = "SELECT * FROM evento $where";
	if($idciudad !='0'){
		$sql="SELECT registro.registro, COUNT(registro.registro) AS cantidad,
					ciudad.nombre FROM registro  
					INNER JOIN ciudad ON ciudad.idciudad = registro.idciudad
				        WHERE registro.idciudad='$idciudad'
					GROUP BY registro.registro";
		$resultado = $link->query($sql);
	}
	else{
		$sql="SELECT registro.registro, COUNT(registro.registro) AS cantidad,
					ciudad.nombre FROM registro  
					INNER JOIN ciudad ON ciudad.idciudad = registro.idciudad
					GROUP BY registro.registro";
		$resultado = $link->query($sql);
	}
	

	require_once "../../../Views/funtion/registro/index.php";
?>