<?php
//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";

	//$idsesion = $_GET['idsesion'];
	$idevento = $_GET['idevento'];
	$idciudad=$_SESSION['idciudad'];
	//echo $idciudad;

	$ciudadevento="SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
		$ciudadrespuesta = $link->query($ciudadevento);
		foreach($ciudadrespuesta as $rowciudadrespuesta){
			$nombreciudadevento=$rowciudadrespuesta['nombre'];
		}

	//$sql = "SELECT * FROM pre_inscripcion where idevento = '$idevento'";
	//$sql="SELECT idasistente,idevento,asistente_sesion.nombre,idsesion,tipoid,correo,celular,genero,institucion_educativa.nombre AS idinstitucion FROM asistente_sesion INNER JOIN institucion_educativa ON  institucion_educativa.idinstitucion = asistente_sesion.idinstitucion  WHERE idsesion = '$idsesion'";
	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	$sql="SELECT idasistente,asistente_sesion.nombre,idevento,tipoid,correo,celular,genero,institucion_educativa.nombre AS idinstitucion, COUNT(asistente_sesion.idsesion) AS asistencia FROM asistente_sesion INNER JOIN institucion_educativa ON  institucion_educativa.idinstitucion = asistente_sesion.idinstitucion  WHERE idevento='$idevento'  GROUP BY asistente_sesion.idasistente";

	$sql2="SELECT COUNT(evento_sesion.id) AS id FROM evento_sesion  WHERE idevento='$idevento' GROUP BY evento_sesion.idevento";
	$resultado2=$link->query($sql2);
	$numerodesesiones = $resultado2->fetch_array(MYSQLI_ASSOC);

	$sesiones=$numerodesesiones['id'];
	//echo $sesiones;

	$resultado = $link->query($sql);


	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	$sql1 = "SELECT idevento,evento_tipo.nombretipo,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE idevento = '$idevento'";
	//$sql1 = "SELECT * FROM evento where idevento = '$idevento'";

	
	
	$resultado1 = $link->query($sql1);
	$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

	$fechaActual = date('d-m-Y');



  
  require_once "../../../Views/funtion/diagrama/reporte_sesion.php";
	

?>