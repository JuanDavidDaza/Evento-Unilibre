<?php
	//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	$cedula = $_GET['cedula'];
	
	$sql1 = "SELECT * FROM conferencistas WHERE cedula = '$cedula'";
	$resultado1 = $link->query($sql1);
	$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

	require('../../../Views/funtion/crud_agregar_conferencista/modificar.php');
