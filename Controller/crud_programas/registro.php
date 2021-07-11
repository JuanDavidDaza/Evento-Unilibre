<?php
//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	$BD = new basedatos();
	$cboidciudad = $BD->ListaValores('idciudad','ciudad','idciudad','ciudad.nombre');
	$idciudad=$_SESSION['idciudad'];
	$ciudad1="SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
		$ciudadresp = $link->query($ciudad1);
		foreach($ciudadresp as $rowciudadresp){
			$nombreciudad=$rowciudadresp['nombre'];
		}



require_once "../../../Views/funtion/crud_programas/registro.php";