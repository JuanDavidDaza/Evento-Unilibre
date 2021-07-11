<?php
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	



	$idciudad=$_SESSION['idciudad'];
	
	//$sql = "SELECT * FROM evento $where";
	if($idciudad !='0'){
		$sql = "SELECT programas.idprograma, programas.nombreprograma,ciudad.nombre, programas.url FROM programas INNER JOIN ciudad on ciudad.idciudad = programas.idciudad WHERE programas.idciudad = '$idciudad'";
		$resultado = $link->query($sql);
	}
	else{
		$sql = "SELECT programas.idprograma, programas.nombreprograma,ciudad.nombre FROM programas INNER JOIN ciudad on ciudad.idciudad = programas.idciudad";
		$resultado = $link->query($sql);
	}

	require_once "../../../Views/funtion/crud_programas/index.php";
?>