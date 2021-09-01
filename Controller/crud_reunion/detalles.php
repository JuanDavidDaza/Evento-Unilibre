<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$acentos = $link->query("SET NAMES 'utf8'");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['idevento'])) {
		$idevento = $_GET['idevento'];

		$sql = "SELECT idevento,evento_tipo.nombretipo,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE idevento='$idevento'";
		$resultado = $link->query($sql);
		$row = $resultado->fetch_array(MYSQLI_ASSOC);

		$nombretipo = $row['nombretipo'];
		$ciudad = $row['nombre'];

		//entidades y programas
		$sql2 = "SELECT * FROM evento_entidades INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad WHERE idevento = '$idevento'";
		$resultado2 = $link->query($sql2);
		$sql3 = "SELECT * FROM evento_programas INNER JOIN programas ON programas.idprograma=evento_programas.programa WHERE idevento = '$idevento'";
		$resultado3 = $link->query($sql3);

		//Conferencistas
		$sqlnombreconfe = "SELECT * FROM evento_conferencistas INNER JOIN conferencistas ON conferencistas.cedula=evento_conferencistas.nombre WHERE idevento = '$idevento'";

		$confe = $link->query($sqlnombreconfe);
		///////


		$sqlnumber2 = "SELECT * FROM evento_sesion WHERE idevento = '$idevento'  order by posicion asc";
		$sesion = $link->query($sqlnumber2);
	} else {
		echo "Error";
		header("location: index.php");
		die();
	}

	//imagenes

	$sqlimg = "SELECT * FROM evento_foto where idevento='$idevento'";
	$resultadoimg = $link->query($sqlimg);
	//$rowimagen3 = $resultadonumber3->fetch_array(MYSQLI_ASSOC);
	$m = "Imagenes de este Evento";
} else {
	echo "Error";
	header("location: index.php");
	die();
}


require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/crud_reunion/detalles.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";
