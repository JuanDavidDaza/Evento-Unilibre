<?php
//valido si es del rol indicado
	require_once "../../../Model/BD.php";
	require_once "../../../Model/session_admin3.php";
	$idciudad=$_SESSION['idciudad'];
	$id=$_SESSION['id'];
	$rol_id=$_SESSION['rol_id'];

	if ($rol_id==4 || $rol_id==1 ) {
		$sql = "SELECT idevento,evento_tipo.nombretipo,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE estado='Activo' AND evento.idciudad='$idciudad'";
		$resultado = $link->query($sql);
	}
	else{
		$sql = "SELECT * FROM evento_usuario INNER JOIN evento ON evento.idevento=evento_usuario.idevento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE idusuario = '$id' and estado= 'Activo'";
		$resultado = $link->query($sql);
		
	}

	require('../../../Views/funtion/crud_asistencia/index.php');
	
?>