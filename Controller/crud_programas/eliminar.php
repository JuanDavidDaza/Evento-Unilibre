<?php
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";


	$idprograma = $_GET['idprograma'];
	$sql = "DELETE FROM programas WHERE idprograma = '$idprograma'";
	$resultado = $link->query($sql);
	require_once "../../../Views/funtion/crud_programas/eliminar.php";
	
?>