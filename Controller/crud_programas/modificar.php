<?php
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	$idprograma = $_GET['idprograma'];
	
	$sql = "SELECT * FROM programas WHERE idprograma = '$idprograma'";
	$resultado = $link->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	$BD = new basedatos();
	$cboidciudad = $BD->ListaValoresDef('idciudad','ciudad','idciudad','ciudad.nombre', $row['idciudad']);
require_once "../../../Views/funtion/crud_programas/modificar.php";
?>