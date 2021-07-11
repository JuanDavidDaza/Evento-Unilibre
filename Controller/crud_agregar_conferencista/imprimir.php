<?php
//valido si es del rol indicado

	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	$sql = "SELECT * FROM conferencistas";
	$resultado = $link->query($sql);

	require('../../../Views/funtion/crud_agregar_conferencista/imprimir.php');
?>