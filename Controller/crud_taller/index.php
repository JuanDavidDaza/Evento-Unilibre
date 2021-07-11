<?php
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	//$sql = "SELECT * FROM evento $where";
	$idciudad=$_SESSION['idciudad'];

	//$sql = "SELECT * FROM evento $where";
	if($idciudad !='0'){
		$sql = "SELECT idevento,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,SUBSTRING(generalinfo,1,100) as generalinfo,evento_tipo.nombretipo  FROM evento INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE evento.idtipoeve='3' and evento.idciudad = '$idciudad'";
		$resultado = $link->query($sql);
	}
	else{
		$sql = "SELECT idevento,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo,evento_tipo.nombretipo  FROM evento INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE evento.idtipoeve='3'";
		$resultado = $link->query($sql);
	}
	

	require_once "../../../Views/funtion/crud_taller/index.php";
?>